<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Markrecord $model */

$this->title = 'Create Markrecord';
$this->params['breadcrumbs'][] = ['label' => 'Markrecords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markrecord-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
