<?php


use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\grid\SelfColumn;
/** @var app\models\Bookmark $bookmarks*/
/** @var yii\web\View $this */
$this->title = "我的收藏";
?>
<div class="message-index">
    <div class="messages"> 
    <?= GridView::widget(['dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $bookmarks,]),
        'columns' => [
            'mark_name',
            [
                'class' => SelfColumn::className(),
            ],
        ],
    ]); 
    ?>

</div>
<h4 class="mb-4 h3">新建收藏夹 ~OVO~</h4>
<?php 
$form = ActiveForm::begin([
    'id' => 'comment-form',
    'action' => ['userspace/bookmark'],
    'fieldConfig' => [
    'template' => "{label}\n{input}\n{error}",
    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    'inputOptions' => ['class' => 'col-lg-16 form-control'],
    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
],]); 
?>
<?= $form->field($model, 'mark_name')->textInput(['autofocus' => true]) ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>