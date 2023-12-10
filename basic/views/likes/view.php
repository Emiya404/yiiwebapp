<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Likes $model */

$this->title = $model->like_post;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="likes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'like_post' => $model->like_post, 'like_user' => $model->like_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'like_post' => $model->like_post, 'like_user' => $model->like_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'like_post',
            'like_user',
            'like_time',
        ],
    ]) ?>

</div>
