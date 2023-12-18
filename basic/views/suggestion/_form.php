<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Suggestion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suggestion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'suggestion_user')->textInput() ?>

    <?= $form->field($model, 'suggestion_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suggestion_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
