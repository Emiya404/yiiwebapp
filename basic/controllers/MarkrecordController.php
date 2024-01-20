<?php

namespace app\controllers;

use app\models\Markrecord;
use app\models\MarkrecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use app\models\User;
/**
 * MarkrecordController implements the CRUD actions for Markrecord model.
 */
class MarkrecordController extends Controller
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
     * Lists all Markrecord models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $searchModel = new MarkrecordSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Markrecord model.
     * @param int $mark_id Mark ID
     * @param int $post_id Post ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mark_id, $post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($mark_id, $post_id),
        ]);
    }

    /**
     * Creates a new Markrecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = new Markrecord();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mark_id' => $model->mark_id, 'post_id' => $model->post_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Markrecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mark_id Mark ID
     * @param int $post_id Post ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mark_id, $post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = $this->findModel($mark_id, $post_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mark_id' => $model->mark_id, 'post_id' => $model->post_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Markrecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mark_id Mark ID
     * @param int $post_id Post ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mark_id, $post_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $this->findModel($mark_id, $post_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Markrecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mark_id Mark ID
     * @param int $post_id Post ID
     * @return Markrecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mark_id, $post_id)
    {
        if (($model = Markrecord::findOne(['mark_id' => $mark_id, 'post_id' => $post_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
