<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\models\User;
use app\models\Comment;
use app\models\Likes;
use app\models\Suggestion;
use app\models\Category;
use app\models\Markrecord;
use app\models\Bookmark;
use app\models\Pollution;
use app\models\Region;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="frontend";

        $regions=Region::find()->all();
        $result=[];
        foreach($regions as $region){
            $pollutions=$region->pollutions;
            if(count($pollutions)>0){
                $result[$region->region_code]=$pollutions[0]->pollution_src;
            }
            
        }

        return $this->render('index', [
            'pollution_data'=>$result
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout="loginlayout";
        /*if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }*/

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message='Hello'){
        return $this->render('say',['message'=>$message]);
    }

    public function actionBlog(){
        $this->layout="frontend";

        $blog_cate=Yii::$app->request->get("category");
        if($blog_cate){
            $blogposts = Post::findAll(['post_type'=>$blog_cate]);
        }else{
            $blogposts = Post::find()->all();
        }

        
        $categories= Category::find()->all();

        return $this->render('blog', [
            'blogposts' => $blogposts,
            'categories'=> $categories  
        ]);
    }

    public function actionSuggestion(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="frontend";
        $suggest=new Suggestion();
        if($this->request->isPost){
            if($suggest->load($this->request->post())){
                $suggest->suggestion_user=Yii::$app->user->identity->user_id;
                $suggest->suggestion_time=date('Y-m-d H:i:s');
                if($suggest->save()){
                    //reload the comments
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', '发送留言失败！');
                    return $this->refresh();
                }
            }
        }

        $old_suggest=Suggestion::find()->all();
        return $this->render("suggestion",['old_suggest'=>$old_suggest,'suggest'=>$suggest]);
    }

    public function actionPwork(){
        $this->layout="frontend";
        return $this->render("pwork",[]);
    }

    public function actionTwork(){
        $this->layout="frontend";
        return $this->render("twork",[]);
    }

    public function actionPassage(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="frontend";
        //按照GET访问参数blog_id从数据库加载文章
        $post_id=Yii::$app->request->get("blog_id");
        $blogpost = Post::findOne(["post_id"=>$post_id]);
        if($blogpost==null){
            return $this->goHome();
        }
        $author=$blogpost->post_author;
        $user=User::findOne(["user_id"=>$author]);
        if($user==null){
            return $this->goHome();
        }
        //传入一个空的评论供view中的新评论填写
        $comment= new Comment();
        if($this->request->isPost){
            if($comment->load($this->request->post())){
                $comment->comment_user=Yii::$app->user->identity->user_id;
                $comment->comment_post=$post_id;
                $comment->comment_time=date('Y-m-d H:i:s');
                if($comment->save()){
                    //reload the comments
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', '发送评论失败！');
                    return $this->refresh();
                }
            }
        }
        //传入一个空赞供view中点赞，并查看总赞数以及当前用户是否能够点赞
        $like=new Likes();
        $old_likes=Likes::findAll(['like_post'=>$post_id]);
        $if_liked=Likes::findOne(['like_post'=>$post_id,'like_user'=>Yii::$app->user->identity->user_id]);
        $old_comments=Comment::findAll(['comment_post'=>$post_id]);
        //传入该用户所有的收藏夹，以供用户进行收藏
        $markr=new Markrecord();
        $bookmarks=Bookmark::findAll(['mark_user'=>Yii::$app->user->identity->user_id]);
        $if_marked=Markrecord::find()
            ->where(['mark_user' => Yii::$app->user->identity->user_id, 'post_id' => $post_id])
            ->joinWith('bookmark')->all();
        //var_dump($if_marked);
        
        return $this->render('passage', [
            'blogpost' => $blogpost,
            'author'=>$user  , 
            'comment'=>$comment ,
            'old_comments'=>$old_comments,
            'like'=>$like,
            'old_likes'=>$old_likes,
            'if_liked'=>$if_liked,
            'markr'=>$markr,
            'old_marks'=>$bookmarks,
            'if_marked'=>$if_marked
        ]);
    }

    public function actionLike(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="frontend";

        //alloc a new comment objection used sending comment
        $likes= new Likes();
        if($this->request->isPost){
            if($likes->load($this->request->post())){
                $likes->like_user=Yii::$app->user->identity->user_id;
                $likes->like_time=date('Y-m-d H:i:s');
                if($likes->save()){
                    //reload the likes
                    return $this->redirect(['site/passage','blog_id'=>$likes->like_post]);
                }else{
                    Yii::$app->session->setFlash('error', '点赞失败！');
                    return $this->redirect(['site/passage','blog_id'=>$likes->like_post]);
                }
            }
        }
    }

    public function actionDislike(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="frontend";

        //alloc a new comment objection used sending comment
        $likes= new Likes();
        if($this->request->isPost){
            if($likes->load($this->request->post())){
                $likes->like_user=Yii::$app->user->identity->user_id;
                if(Likes::findOne(['like_user'=>$likes->like_user,'like_post'=>$likes->like_post])->delete()){
                    //reload the likes
                    return $this->redirect(['site/passage','blog_id'=>$likes->like_post]);
                }else{
                    Yii::$app->session->setFlash('error', '取消点赞失败！');
                    return $this->redirect(['site/passage','blog_id'=>$likes->like_post]);
                }
            }
        }
    }

    public function actionMark(){
        if($this->checkuser()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='frontend';

        
        $mark=new Markrecord();
        if($this->request->isPost){
            $allPostKeys = $this->request->post();
            $keys=array_keys($allPostKeys);
            //var_dump($keys);
            //die;
            
            foreach ($keys as $key) {
                if(strpos($key, 'mark-button') === 0){
                    $extractedString = str_replace('mark-button', '', $key);
                //echo "提取的字符串：$extractedString <br>";
                }
            }
            //var_dump($extractedString);
            //die;
            if($mark->load($this->request->post())){
                $mark->mark_id=$extractedString;
                
                if($mark->save()){
                    //reload the likes
                    return $this->redirect(['site/passage','blog_id'=>$mark->post_id]);
                }else{
                    Yii::$app->session->setFlash('error', '收藏失败！');
                    return $this->redirect(['site/passage','blog_id'=>$mark->post_id]);
                }
            }
        }
    }
    
}
