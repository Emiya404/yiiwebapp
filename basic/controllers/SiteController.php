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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="frontend";
        $comment = Comment::find()->all();
        $model=new Comment();

        if(Yii::$app->request->isPost){
            if(Yii::$app->user->isGuest){
                Yii::$app->session->setFlash('error', '请先登录');
                return $this->refresh();
            }
            
            if($model->load(Yii::$app->request->post())){
            $model->comment_user=Yii::$app->user->identity->user_id;
            $model->comment_time=date('Y-m-d H:i:s');
                if($model->save()){
                    return $this->redirect(['site/index']);
                }else{
                    Yii::$app->session->setFlash('error', '发送评论保存数据失败！');
                    return $this->refresh();
                }
            }
        }

        return $this->render('index', [
            'comments' => $comment,
            'model' => $model
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
        $blogposts = Post::find()->all();
        return $this->render('blog', [
            'blogposts' => $blogposts,     
        ]);
    }

    public function actionPassage(){
        $this->layout="frontend";
        //load the passage from db and find its author
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

        //alloc a new comment objection used sending comment
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

        $old_comments=Comment::findAll(['comment_post'=>$post_id]);
        //load old comments for diplaying the comments
        return $this->render('passage', [
            'blogpost' => $blogpost,
            'author'=>$user  , 
            'comment'=>$comment ,
            'old_comments'=>$old_comments,
        ]);
    }
}
