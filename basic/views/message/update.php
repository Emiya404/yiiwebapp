<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Message $model */

$this->title = 'Update Message: ' . $model->msg_id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msg_id, 'url' => ['view', 'msg_id' => $model->msg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
