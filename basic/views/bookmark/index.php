<?php

use app\models\Bookmark;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookmarkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bookmarks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookmark-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bookmark', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mark_id',
            'mark_name',
            'mark_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bookmark $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'mark_id' => $model->mark_id]);
                 }
            ],
        ],
    ]); ?>


</div>
