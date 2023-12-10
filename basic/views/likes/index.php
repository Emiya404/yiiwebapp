<?php

use app\models\Likes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LikesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Likes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Likes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'like_post',
            'like_user',
            'like_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Likes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'like_post' => $model->like_post, 'like_user' => $model->like_user]);
                 }
            ],
        ],
    ]); ?>


</div>
