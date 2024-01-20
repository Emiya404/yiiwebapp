<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Likes;
use app\models\Comment;
use app\models\Markrecord;
use Yii;
/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function checkadmin(){
        if(Yii::$app->user->identity==null){
            return false;
        }
        $user=User::findOne(['user_id'=>Yii::$app->user->identity->user_id]);
        if($user->user_type==="admin"){
            return true;
        }
        return false;
    }
    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $post_id Post ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($post_id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = new Post();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'post_id' => $model->post_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $post_id Post ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = $this->findModel($post_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $post_id Post ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $post=$this->findModel($post_id);
        Post::deletePoatWithOther($post_id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $post_id Post ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id)
    {
        if (($model = Post::findOne(['post_id' => $post_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
