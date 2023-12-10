<?php

use app\models\Pollution;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PollutionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pollutions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pollution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pollution', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pollution_id',
            'pollution_type',
            'pollution_src',
            'pollution_date',
            'region_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pollution $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pollution_id' => $model->pollution_id]);
                 }
            ],
        ],
    ]); ?>


</div>
