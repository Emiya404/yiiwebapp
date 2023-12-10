<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Message $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'send_uid')->textInput() ?>

    <?= $form->field($model, 'recv_uid')->textInput() ?>

    <?= $form->field($model, 'msg_time')->textInput() ?>

    <?= $form->field($model, 'msg_read')->textInput() ?>

    <?= $form->field($model, 'msg_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
