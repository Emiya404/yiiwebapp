<?php

use app\models\Blogpost;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlogpostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blogposts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogpost-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blogpost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'title',
            'content:ntext',
            'author_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blogpost $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'post_id' => $model->post_id]);
                 }
            ],
        ],
    ]); ?>


</div>
