<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SuggestionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suggestion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'suggestion_id') ?>

    <?= $form->field($model, 'suggestion_user') ?>

    <?= $form->field($model, 'suggestion_text') ?>

    <?= $form->field($model, 'suggestion_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
