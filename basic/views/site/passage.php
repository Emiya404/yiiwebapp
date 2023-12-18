<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\widgets\DetailView;
/** @var yii\web\View $this */
/** @var app\models\User $author */
/** @var app\models\Comment $comment */
/** @var app\models\Like $like*/
$this->title="Passage";
$like->like_post=$blogpost->post_id;
$counter=count($old_likes);
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
			<?php 
			    if($if_liked==null){
					$form = ActiveForm::begin([
    					'id' => 'like-form',
						'action' => ['site/like'],
    					'fieldConfig' => [
    					'template' => "{label}\n{input}\n{error}",
    					'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    					'inputOptions' => ['class' => 'col-lg-16 form-control'],
    					'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
						],]); 
				}
				else{
					$form = ActiveForm::begin([
    					'id' => 'like-form',
						'action' => ['site/dislike'],
    					'fieldConfig' => [
    					'template' => "{label}\n{input}\n{error}",
    					'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    					'inputOptions' => ['class' => 'col-lg-16 form-control'],
    					'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
						],]); 
				}
			?>
			<?= $form->field($like, 'like_post')->hiddenInput();?>
			<div class="form-group">
    			<div>
        			<?php 
						if($if_liked==null){
							echo Html::submitButton('点赞 '.$counter, ['class' => 'btn btn-primary', 'name' => 'like-button']) ;
						}
						else{
							echo Html::submitButton('已点赞 '.$counter, ['class' => 'btn btn-primary', 'name' => 'like-button']) ;
						}
					?>
   				</div>
			</div>
			<?php ActiveForm::end(); ?>



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


	
