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

    <?= GridView::widget(['dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => [$user]]),
        'columns' => [
            'username',
            'password',
            //'user_type',
        ],
    ]); ?>



</div>
