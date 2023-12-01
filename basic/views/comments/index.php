<?php

use app\models\Comments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CommentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'comment_id',
            'user_id',
            'comment_text:ntext',
            'creation_date',
            'parent_comment_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Comments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'comment_id' => $model->comment_id]);
                 }
            ],
        ],
    ]); ?>


</div>
