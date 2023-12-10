<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Region $model */

$this->title = 'Update Region: ' . $model->region_id;
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->region_id, 'url' => ['view', 'region_id' => $model->region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
