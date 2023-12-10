<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
/** @var yii\web\View $this */
/** @var app\models\User $author */
/** @var app\models\Comment $comment */
$this->title="Passage";
?>


<div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<article>
			<h1><strong><?= Html::encode("{$blogpost->post_title}") ?></strong>
            <h3></h3>
			<p>
			<?= Html::encode("{$author->username}") ?> <?= Html::encode("{$blogpost->post_time}") ?>
			</p>
			<p>
            <?= Html::encode("{$blogpost->post_text}") ?>
			</p>
			</article>
			<?= Html::encode("发送一条友善的评论") ?>
			<?php 
				$form = ActiveForm::begin([
    				'id' => 'comment-form',
    				'fieldConfig' => [
    				'template' => "{label}\n{input}\n{error}",
    				'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    				'inputOptions' => ['class' => 'col-lg-16 form-control'],
    				'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
				],]); 
			?>
			<?= $form->field($comment, 'comment_text')->textarea(['autofocus' => true]) ?>
			<div class="form-group">
    			<div>
        			<?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
   				</div>
			</div>
			<?php ActiveForm::end(); ?>
			<?php foreach ($old_comments as $comment):
    			$user_id=$comment->comment_user;
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
	</div>
</div>


	
