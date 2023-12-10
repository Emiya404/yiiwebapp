<?php

use app\models\User;

use yii\helpers\Html;
use yii\grid\SelfColumn;
use yii\grid\GridView;
/** @var app\models\User $user*/
/** @var yii\web\View $this */
$this->title = $user->username;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
         'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => [$user], // 将 User 对象放入数据提供器
        ]),
        'columns' => [
            'username',
            'password',
            //'user_type',
            [
                'class' => SelfColumn::className(),
            ],
        ],
    ]); ?>


</div>
