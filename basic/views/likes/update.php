<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Likes $model */

$this->title = 'Update Likes: ' . $model->like_post;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->like_post, 'url' => ['view', 'like_post' => $model->like_post, 'like_user' => $model->like_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="likes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
