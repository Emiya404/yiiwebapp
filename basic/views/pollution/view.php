<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pollution $model */

$this->title = $model->pollution_id;
$this->params['breadcrumbs'][] = ['label' => 'Pollutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pollution-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pollution_id' => $model->pollution_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pollution_id' => $model->pollution_id], [
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
            'pollution_id',
            'pollution_type',
            'pollution_src',
            'pollution_date',
            'region_id',
        ],
    ]) ?>

</div>
