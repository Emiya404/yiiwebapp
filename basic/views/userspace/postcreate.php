<?php

use app\models\Post;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var app\models\Post $post*/
/** @var yii\web\View $this */
$this->title = "私信列表";
?>
<div >
    <h4 class="mb-4 h3">发送文章 ~OVO~</h4>
	<?php 
    $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => ['userspace/postcreate'],
        'options' => ['enctype' => 'multipart/form-data']
        ,]); 
    ?>
    <?= $form->field($post, 'post_title')->textInput(['autofocus' => true]) ?>
    <?= $form->field($post, 'post_type')->textInput() ?>
    <?= $form->field($post, 'post_text',['inputOptions' => [
        'style' => 'height: 220px;',
    ]])->textarea() ?>
    <?=$form->field($post, 'post_image')->fileInput();?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
