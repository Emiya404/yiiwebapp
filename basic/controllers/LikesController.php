<?php

namespace app\controllers;

use app\models\Likes;
use app\models\LikesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LikesController implements the CRUD actions for Likes model.
 */
class LikesController extends Controller
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

    /**
     * Lists all Likes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="backend";
        $searchModel = new LikesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Likes model.
     * @param int $like_post Like Post
     * @param int $like_user Like User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($like_post, $like_user)
    {
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($like_post, $like_user),
        ]);
    }

    /**
     * Creates a new Likes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout="backend";
        $model = new Likes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'like_post' => $model->like_post, 'like_user' => $model->like_user]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Likes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $like_post Like Post
     * @param int $like_user Like User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($like_post, $like_user)
    {
        $this->layout="backend";
        $model = $this->findModel($like_post, $like_user);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'like_post' => $model->like_post, 'like_user' => $model->like_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Likes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $like_post Like Post
     * @param int $like_user Like User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($like_post, $like_user)
    {
        $this->layout="backend";
        $this->findModel($like_post, $like_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Likes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $like_post Like Post
     * @param int $like_user Like User
     * @return Likes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($like_post, $like_user)
    {
        if (($model = Likes::findOne(['like_post' => $like_post, 'like_user' => $like_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
