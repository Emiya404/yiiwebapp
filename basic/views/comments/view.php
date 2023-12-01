<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Comments $model */

$this->title = $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'comment_id' => $model->comment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'comment_id' => $model->comment_id], [
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
            'comment_id',
            'user_id',
            'comment_text:ntext',
            'creation_date',
            'parent_comment_id',
        ],
    ]) ?>

</div>
