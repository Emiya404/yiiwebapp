<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PollutionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pollution-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pollution_id') ?>

    <?= $form->field($model, 'pollution_type') ?>

    <?= $form->field($model, 'pollution_src') ?>

    <?= $form->field($model, 'pollution_date') ?>

    <?= $form->field($model, 'region_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
