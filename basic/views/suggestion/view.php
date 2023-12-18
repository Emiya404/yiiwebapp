<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Suggestion $model */

$this->title = $model->suggestion_id;
$this->params['breadcrumbs'][] = ['label' => 'Suggestions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="suggestion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'suggestion_id' => $model->suggestion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'suggestion_id' => $model->suggestion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'suggestion_id',
            'suggestion_user',
            'suggestion_text:ntext',
            'suggestion_time',
        ],
    ]) ?>

</div>
