<?php

namespace app\controllers;

use app\models\Comments;
use app\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
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
     * Lists all Comments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="backend";
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param int $comment_id Comment ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($comment_id)
    {
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($comment_id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout="backend";
        $model = new Comments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'comment_id' => $model->comment_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $comment_id Comment ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($comment_id)
    {
        $this->layout="backend";
        $model = $this->findModel($comment_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'comment_id' => $model->comment_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $comment_id Comment ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($comment_id)
    {
        $this->layout="backend";
        $this->findModel($comment_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $comment_id Comment ID
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($comment_id)
    {
        if (($model = Comments::findOne(['comment_id' => $comment_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
