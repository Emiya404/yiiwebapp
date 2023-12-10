<?php

use app\models\Message;

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
/** @var app\models\Post $posts*/
/** @var yii\web\View $this */
$this->title = "我的文章";
?>
<div class="message-index">
    <div class="messages"> 
    <?= GridView::widget(['dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $posts,]),
        'columns' => [
            'post_title',
            'post_type',
            'post_time',
            "post_text",
        ],
    ]); 
    ?>

</div>