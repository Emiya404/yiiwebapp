<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Comments $model */

$this->title = 'Update Comments: ' . $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment_id, 'url' => ['view', 'comment_id' => $model->comment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
