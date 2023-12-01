<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Blogpost $model */

$this->title = 'Update Blogpost: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'post_id' => $model->post_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
