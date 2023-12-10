<?php

namespace app\controllers;

use app\models\Pollution;
use app\models\PollutionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PollutionController implements the CRUD actions for Pollution model.
 */
class PollutionController extends Controller
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
     * Lists all Pollution models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="backend";
        $searchModel = new PollutionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pollution model.
     * @param int $pollution_id Pollution ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pollution_id)
    {
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($pollution_id),
        ]);
    }

    /**
     * Creates a new Pollution model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout="backend";
        $model = new Pollution();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pollution_id' => $model->pollution_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pollution model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pollution_id Pollution ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pollution_id)
    {
        $this->layout="backend";
        $model = $this->findModel($pollution_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pollution_id' => $model->pollution_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pollution model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pollution_id Pollution ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pollution_id)
    {
        $this->layout="backend";
        $this->findModel($pollution_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pollution model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pollution_id Pollution ID
     * @return Pollution the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pollution_id)
    {
        if (($model = Pollution::findOne(['pollution_id' => $pollution_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
