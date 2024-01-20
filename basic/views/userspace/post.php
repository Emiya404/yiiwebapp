<?php
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
            [
                'label'=>'delete post',
                'format'=>'raw',
                'value'=> function($model){
                    return  Html::a('删除文章', ['userspace/deletepost'], [
                        'class'=>'btn btn-outline-danger w-100',
                        'data'=>['method'=>'post','params'=>['post_id'=>$model->post_id,],] 
                    ]);
                }
            ]
        ],
    ]); 
    ?>

</div>