<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Markrecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="markrecord-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mark_id')->textInput() ?>

    <?= $form->field($model, 'post_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
