<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Likes $model */

$this->title = 'Create Likes';
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
