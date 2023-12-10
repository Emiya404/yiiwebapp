<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Markrecord $model */

$this->title = 'Update Markrecord: ' . $model->mark_id;
$this->params['breadcrumbs'][] = ['label' => 'Markrecords', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mark_id, 'url' => ['view', 'mark_id' => $model->mark_id, 'post_id' => $model->post_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="markrecord-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
