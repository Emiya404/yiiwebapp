<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_post')->textInput() ?>

    <?= $form->field($model, 'comment_user')->textInput() ?>

    <?= $form->field($model, 'comment_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
