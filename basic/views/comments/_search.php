<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CommentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'comment_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'comment_text') ?>

    <?= $form->field($model, 'creation_date') ?>

    <?= $form->field($model, 'parent_comment_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
