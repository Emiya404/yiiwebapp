<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pollution $model */

$this->title = 'Create Pollution';
$this->params['breadcrumbs'][] = ['label' => 'Pollutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pollution-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
