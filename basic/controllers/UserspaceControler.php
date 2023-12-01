<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Blogpost;
use app\models\Comments;
use app\models\User;

class UserspaceController extends Controller{
    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
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

    public function actionIndex(){
        $this->layout="backend";
        $user=User::findOne(["user_id"=>Yii::$app->user->identity->user_id]);
        return null;
    }
}