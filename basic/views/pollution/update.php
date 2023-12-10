<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pollution $model */

$this->title = 'Update Pollution: ' . $model->pollution_id;
$this->params['breadcrumbs'][] = ['label' => 'Pollutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pollution_id, 'url' => ['view', 'pollution_id' => $model->pollution_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pollution-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
