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
use app\models\Comment;
use app\models\Likes;
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
    public static function checkuser(){
        if(Yii::$app->user->identity==null){
            return false;
        }
        $user=User::findOne(['user_id'=>Yii::$app->user->identity->user_id]);
        return true;
    }
    //展示用户的id和用户名信息
    public function actionIndex(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
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
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="selfback";
        
        $user=User::findOne(["user_id"=>Yii::$app->user->identity->user_id]);
        if($user===null){
            return $this->redirect(['site/index']);
        }
        
        $send_messages=Message::findAll(["send_uid"=>Yii::$app->user->identity->user_id]);
        $recv_messages=Message::findAll(["recv_uid"=>Yii::$app->user->identity->user_id]);


        return $this->render('message',[ 'send_message'=>$send_messages ,'recv_message'=>$recv_messages,'model'=>new Message() ]);
    }
    //发送私信功能
    public function actionMessagecreate(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout= 'selfback';
        $message=new Message();
        if($this->request->isPost){
            if($message->load($this->request->post())){
                $text=$message->msg_text;
                $receivers=User::findAll(['username'=>$message->receiver_name]);
                foreach($receivers as $receiver){
                    $message=new Message();
                    $message->msg_text=$text;
                    $message->send_uid=Yii::$app->user->identity->user_id;
                    $message->msg_time=date('Y-m-d H:i:s');
                    $message->recv_uid=$receiver->user_id;
                    $message->save();
                }
                return $this->redirect(['userspace/index']);
            }
        }
    }
    //展示用户的文章
    public function actionPost(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout= 'selfback';
        $posts=Post::findAll(['post_author'=>Yii::$app->user->identity->user_id]);
        return $this->render('post',['posts'=>$posts]);
    }

    //用户发布文章
    public function actionPostcreate(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout= 'selfback';
        $post=new Post();

        if($this->request->isPost){
            if($post->load($this->request->post())){
                $file=UploadedFile::getInstance($post, 'post_image');
                if($file){
                    $filePath = 'frontendassets/img/blogimage/' .'blog'.count(Post::find()->all()). '.' . $file->extension;
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
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout= 'selfback';
        $bookmarks=Bookmark::findAll(['mark_user'=>Yii::$app->user->identity->user_id]);
        $model=new Bookmark();
        if($this->request->isPost){
            if($model->load($this->request->post())){
                $model->mark_user=Yii::$app->user->identity->user_id;
                if($model->save()){
                    return $this->redirect(['userspace/index']);
                }else {
                    Yii::$app->session->setFlash('error', '创建收藏夹失败');
                    return $this->refresh();
                }
            }
        }
        return $this->render('bookmark',['bookmarks'=>$bookmarks,'model'=>$model]);
    }

    public function actionMarkrecord(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='selfback';
        $markrecord=new Markrecord();
        if($this->request->isPost){
            $allPostKeys = $this->request->post();
            $keys=array_keys($allPostKeys);
            
            foreach ($keys as $key) {
                if(strpos($key, 'delete-record') === 0){
                    $parts = explode('-', $key);
                    $mark_id = $parts[2];
                    $post_id = $parts[3];

                    if(Markrecord::findOne(['mark_id'=>$mark_id,'post_id'=>$post_id])->delete()){
                        return $this->redirect(['userspace/markrecord']);
                    }else{
                        Yii::$app->session->setFlash('error', '删除记录失败！');
                        return $this->redirect(['userspace/markrecord']);
                    }
                    break;
                }
            }
        }


        $bookmarks=Bookmark::findAll(['mark_user'=>Yii::$app->user->identity->user_id]);
        $result=[];
        foreach($bookmarks as $bookmark){
            $result[$bookmark->mark_name]=$bookmark->markrecord;
            //var_dump($result[$bookmark->mark_name]);
            //die;
        }
        
        return $this->render('markrecord',['mark_data'=>$result,'empty_record'=>$markrecord]);
    }
    
    public function actionDeletebookmark(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='selfback';
        $bookmark=new Bookmark();
        if($this->request->isPost){
            $post_data = $this->request->post();
            if(array_key_exists('mark_id',$post_data)){
                //确认要删除的收藏夹是用户本人的
                $bookmark=Markrecord::find(['mark_id'=>$post_data['mark_id']])->one();
                if($bookmark==null || $bookmark->mark_user!=Yii::$app->user->identity->user_id){
                    $this->redirect(['userspace/bookmark']);
                }
                //先删除markrecord
                $markrecords=Markrecord::findAll(['mark_id'=>$post_data['mark_id']]);
                
                foreach($markrecords as $markrecord){
                    Markrecord::findOne(['mark_id'=>$markrecord->mark_id,'post_id'=>$markrecord->post_id])->delete();
                }
                //再删除bookmark
                Bookmark::findOne(['mark_id'=>$post_data['mark_id']])->delete();
                return $this->redirect(['userspace/bookmark']);
            }
        }
        return $this->redirect(['userspace/bookmark']);
    }

    public function actionDeletepost(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='selfback';
        
        $post=new Post();
        if($this->request->isPost){
            $post_data = $this->request->post();
            $post=Post::find(['post_id'=>$post_data['post_id']])->one();
                if($post==null || $post->post_author!=Yii::$app->user->identity->user_id){
                    $this->redirect(['userspace/post']);
            }
            if(array_key_exists('post_id',$post_data)){
                Post::deletePoatWithOther($post_data['post_id']);
            }
            //删除有关的评论，点赞，收藏记录
            
        }
        return $this->redirect(['userspace/post']);
    }

    
}