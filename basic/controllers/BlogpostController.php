<?php

namespace app\controllers;

use app\models\Blogpost;
use app\models\BlogpostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogpostController implements the CRUD actions for Blogpost model.
 */
class BlogpostController extends Controller
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
     * Lists all Blogpost models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="backend";
        $searchModel = new BlogpostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogpost model.
     * @param int $post_id Post ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($post_id)
    {
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($post_id),
        ]);
    }

    /**
     * Creates a new Blogpost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout="backend";
        $model = new Blogpost();

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
     * Updates an existing Blogpost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $post_id Post ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($post_id)
    {
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
     * Deletes an existing Blogpost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $post_id Post ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($post_id)
    {
        $this->layout="backend";
        $this->findModel($post_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blogpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $post_id Post ID
     * @return Blogpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id)
    {
        if (($model = Blogpost::findOne(['post_id' => $post_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
