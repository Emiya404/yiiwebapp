<?php

namespace app\controllers;

use app\models\Suggestion;
use app\models\SuggestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use Yii;
/**
 * SuggestionController implements the CRUD actions for Suggestion model.
 */
class SuggestionController extends Controller
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
     * Lists all Suggestion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='backend';
        $searchModel = new SuggestionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Suggestion model.
     * @param int $suggestion_id Suggestion ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($suggestion_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='backend';
        return $this->render('view', [
            'model' => $this->findModel($suggestion_id),
        ]);
    }

    /**
     * Creates a new Suggestion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='backend';
        $model = new Suggestion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'suggestion_id' => $model->suggestion_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Suggestion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $suggestion_id Suggestion ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($suggestion_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='backend';
        $model = $this->findModel($suggestion_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'suggestion_id' => $model->suggestion_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Suggestion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $suggestion_id Suggestion ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($suggestion_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout='backend';
        $this->findModel($suggestion_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Suggestion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $suggestion_id Suggestion ID
     * @return Suggestion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($suggestion_id)
    {
        if (($model = Suggestion::findOne(['suggestion_id' => $suggestion_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
