<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Blogpost $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blogpost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'post_id' => $model->post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'post_id' => $model->post_id], [
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
            'post_id',
            'title',
            'content:ntext',
            'author_id',
        ],
    ]) ?>

</div>
