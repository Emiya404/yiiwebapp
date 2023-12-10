<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pollution $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pollution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pollution_type')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pollution_src')->textInput() ?>

    <?= $form->field($model, 'pollution_date')->textInput() ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
