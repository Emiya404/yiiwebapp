<?php

use app\models\Message;

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
/** @var app\models\Message $send_message*/
/** @var app\models\Message $recv_message*/
/** @var app\models\Message $model*/
/** @var yii\web\View $this */
$this->title = "私信列表";
?>
<div class="message-index">
    <div class="messages">
        <h2>我发送的消息</h2>
        
        <?= GridView::widget(['dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $send_message,]),
            'columns' => [
                'recv_uid',
                'msg_time',
                'msg_text',
            ],
        ]); 
        ?>

        <h2>我接收的消息</h2>
        <?= GridView::widget(['dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $recv_message,]),
            'columns' => [
                'recv_uid',
                'msg_time',
                'msg_text',
            ],
        ]); 
        ?>
    </div>
    <h4 class="mb-4 h3">发送私信 ~OVO~</h4>
	<?php 
    $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => ['userspace/messagecreate'],
        'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
        'inputOptions' => ['class' => 'col-lg-16 form-control'],
        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    ],]); 
    ?>
    <?= $form->field($model, 'recv_uid')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'msg_text')->textInput() ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
