<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\User;
use yii\bootstrap5\Alert;
/** @var yii\web\View $this */
/** @var app\models\Comments $model*/

$this->title = '新闻站首页';
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo Alert::widget([
        'options' => ['class' => 'alert-danger'], // 设置提示框样式
        'body' => $message,
    ]);
}
?>
<div class="col-md-12 pr-4">
	<h4 class="mb-4 h3">向网站留言 ~OVO~</h4>
	<?php $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => ['site/index'],
        'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
        'inputOptions' => ['class' => 'col-lg-16 form-control'],
        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    ],]); 
    ?>
    <?= $form->field($model, 'comment_text')->textInput(['autofocus' => true]) ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


    <?php foreach ($comments as $comment):
    $user_id=$comment->user_id;
    $user_name=User::findOne(["user_id"=>$user_id])->username;
    ?>
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h5 class="card-title"> <?= Html::encode("{$user_name}") ?> </h5>
                <p class="card-text text-muted">
                    <?= Html::encode("{$comment->comment_text}") ?>
                </p>
        </div>
    </div>
    </br>
    <?php endforeach; ?>
</div>

