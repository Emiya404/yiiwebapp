<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Suggestion $model */

$this->title = 'Update Suggestion: ' . $model->suggestion_id;
$this->params['breadcrumbs'][] = ['label' => 'Suggestions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suggestion_id, 'url' => ['view', 'suggestion_id' => $model->suggestion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suggestion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
