<?php

use app\models\Markrecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MarkrecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Markrecords';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markrecord-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Markrecord', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mark_id',
            'post_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Markrecord $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'mark_id' => $model->mark_id, 'post_id' => $model->post_id]);
                 }
            ],
        ],
    ]); ?>


</div>
