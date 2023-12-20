<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\Post;
use app\models\Message;
use app\models\Bookmark;
use app\models\Markrecord;
use yii\web\UploadedFile;

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
    //展示用户的id和用户名信息
    public function actionIndex(){
        $this->layout="selfback";
        
        //return the user message
        $user=User::findOne(["user_id"=>Yii::$app->user->identity->user_id]);
        if($user===null){
            return $this->redirect(['site/index']);
        }
        return $this->render('index',[ 'user'=>$user ]);
    }
    //展示用户收到或者发出的私信
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
    //发送私信功能
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
    //展示用户的文章
    public function actionPost(){
        $this->layout= 'selfback';
        $posts=Post::findAll(['post_author'=>Yii::$app->user->identity->user_id]);
        return $this->render('post',['posts'=>$posts]);
    }

    //用户发布文章
    public function actionPostcreate(){
        $this->layout= 'selfback';
        $post=new Post();

        if($this->request->isPost){
            if($post->load($this->request->post())){
                $file=UploadedFile::getInstance($post, 'post_image');
                if($file){
                    $filePath = 'frontendassets/img/blogimage/' .'blog'.$post->post_id. '.' . $file->extension;
                    $file->saveAs($filePath);
                    $post->post_image = $filePath;
                }
                $post->post_author=Yii::$app->user->identity->user_id;
                $post->post_time=date('Y-m-d H:i:s');
                if($post->save()){
                    return $this->redirect(['userspace/index']);
                }else {
                    Yii::$app->session->setFlash('error', '文章发表失败');
                    return $this->refresh();
                }
            }
        }
        return $this->render('postcreate',['post'=>$post]);
    }

    //用户添加收藏夹
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