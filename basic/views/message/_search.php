<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MessageSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'msg_id') ?>

    <?= $form->field($model, 'send_uid') ?>

    <?= $form->field($model, 'recv_uid') ?>

    <?= $form->field($model, 'msg_time') ?>

    <?= $form->field($model, 'msg_read') ?>

    <?php // echo $form->field($model, 'msg_text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
