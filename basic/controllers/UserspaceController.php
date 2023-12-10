<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Post;
use app\models\Message;
use app\models\Bookmark;
use app\models\Markrecord;

class UserspaceController extends Controller{
    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],                    
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $this->layout="selfback";
        
        //return the user message
        $user=User::findOne(["user_id"=>Yii::$app->user->identity->user_id]);
        if($user===null){
            return $this->redirect(['site/index']);
        }
        return $this->render('index',[ 'user'=>$user ]);
    }

    public function actionMessage(){
        $this->layout="selfback";
        
        $user=User::findOne(["user_id"=>Yii::$app->user->identity->user_id]);
        if($user===null){
            return $this->redirect(['site/index']);
        }
        //return all the message sent of recvd by the user
        $send_messages=Message::findAll(["send_uid"=>Yii::$app->user->identity->user_id]);
        $recv_messages=Message::findAll(["recv_uid"=>Yii::$app->user->identity->user_id]);


        return $this->render('message',[ 'send_message'=>$send_messages ,'recv_message'=>$recv_messages,'model'=>new Message() ]);
    }

    public function actionMessagecreate(){
        $this->layout= 'selfback';
        $message=new Message();
        if($this->request->isPost){
            if($message->load($this->request->post())){
                $message->send_uid=Yii::$app->user->identity->user_id;
                $message->msg_time=date('Y-m-d H:i:s');
                if($message->save()){
                    return $this->redirect(['userspace/index']);
                }else{
                    Yii::$app->session->setFlash('error', '私信发送失败');
                    return $this->refresh();
                }
            }
        }
    }

    public function actionPost(){
        $this->layout= 'selfback';
        $posts=Post::findAll(['post_author'=>Yii::$app->user->identity->user_id]);
        return $this->render('post',['posts'=>$posts]);
    }

    public function actionPostcreate(){
        $this->layout= 'selfback';
        $model=new Post();
        if($this->request->isPost){
            if($model->load($this->request->post())){
                $model->post_author=Yii::$app->user->identity->user_id;
                $model->post_time=date('Y-m-d H:i:s');
                if($model->save()){
                    return $this->redirect(['userspace/index']);
                }else {
                    Yii::$app->session->setFlash('error', '文章发表失败');
                    return $this->refresh();
                }
            }
        }
        return $this->render('postcreate',['model'=>$model]);
    }

    public function actionBookmark(){
        $this->layout= 'selfback';
        $bookmarks=Bookmark::findAll(['mark_user'=>Yii::$app->user->identity->user_id]);
        $model=new Bookmark();
        if($this->request->isPost){
            if($model->load($this->request->post())){
                $model->mark_user=Yii::$app->user->identity->user_id;
                if($model->save()){
                    return $this->redirect(['userspace/index']);
                }else {
                    Yii::$app->session->setFlash('error', '文章发表失败');
                    return $this->refresh();
                }
            }
        }
        return $this->render('bookmark',['bookmarks'=>$bookmarks,'model'=>$model]);
    }
}