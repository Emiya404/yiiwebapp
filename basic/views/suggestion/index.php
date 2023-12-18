<?php

use app\models\Suggestion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SuggestionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Suggestions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suggestion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Suggestion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'suggestion_id',
            'suggestion_user',
            'suggestion_text:ntext',
            'suggestion_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Suggestion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'suggestion_id' => $model->suggestion_id]);
                 }
            ],
        ],
    ]); ?>


</div>
