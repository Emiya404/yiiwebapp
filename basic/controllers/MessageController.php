<?php

namespace app\controllers;

use app\models\Message;
use app\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use Yii;
/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
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
     * Lists all Message models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param int $msg_id Msg ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($msg_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        return $this->render('view', [
            'model' => $this->findModel($msg_id),
        ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = new Message();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'msg_id' => $model->msg_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $msg_id Msg ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($msg_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $model = $this->findModel($msg_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'msg_id' => $model->msg_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $msg_id Msg ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($msg_id)
    {
        if($this->checkadmin()===false){
            return $this->redirect(['site/login']);
        }
        $this->layout="backend";
        $this->findModel($msg_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $msg_id Msg ID
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($msg_id)
    {
        if (($model = Message::findOne(['msg_id' => $msg_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
