<?php

namespace app\controllers;

use app\models\Pollution;
use app\models\Region;
use app\models\RegionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use Yii;
/**
 * RegionController implements the CRUD actions for Region model.
 */
class RegionController extends Controller
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
     * Lists all Region models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $searchModel = new RegionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Region model.
     * @param int $region_id Region ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($region_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($region_id),
        ]);
    }

    /**
     * Creates a new Region model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = new Region();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'region_id' => $model->region_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Region model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $region_id Region ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($region_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = $this->findModel($region_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'region_id' => $model->region_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Region model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $region_id Region ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($region_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $region=Region::findOne(['region_id'=>$region_id]);
        foreach($region->pollutions as $pollution){
            Pollution::findOne(['pollution_id'=>$pollution->pollution_id])->delete();
        }
        $region->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Region model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $region_id Region ID
     * @return Region the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($region_id)
    {
        
        if (($model = Region::findOne(['region_id' => $region_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
