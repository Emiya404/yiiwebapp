<?php

use app\models\Post;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
/** @var app\models\Post $model*/
/** @var yii\web\View $this */
$this->title = "私信列表";
?>
<div >
    <h4 class="mb-4 h3">发送文章 ~OVO~</h4>
	<?php 
    $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => ['userspace/postcreate'],
        'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
        'inputOptions' => ['class' => 'col-lg-16 form-control'],
        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    ],]); 
    ?>
    <?= $form->field($model, 'post_title')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'post_type')->textInput() ?>
    <?= $form->field($model, 'post_text',['inputOptions' => [
        'style' => 'height: 220px;',
    ]])->textarea() ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
