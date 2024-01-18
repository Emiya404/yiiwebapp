<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\widgets\DetailView;
use app\models\Bookmark;
use app\models\Markrecord;
/** @var yii\web\View $this */
/** @var app\models\User $author */
/** @var app\models\Comment $comment */
/** @var app\models\Like $like*/
$this->title="Passage";
$like->like_post=$blogpost->post_id;
$markr->post_id=$blogpost->post_id;
$counter=count($old_likes);
if(count($if_marked)>0){
	$al_mark=Bookmark::findAll(['mark_id'=>$if_marked[0]->mark_id]);
}
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
			<?= $form->field($like, 'like_post')->hiddenInput()->label(false);?>
			
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
			
			<?php ActiveForm::end(); ?>
			</br>
			<?php
				if(count($if_marked)==0){
					echo Html::Button('收藏', ['class' => 'btn btn-primary', 'name' => 'mark-button','data-toggle'=>"modal" ,'data-target'=>"#modal_newsletter"]) ;
				}else{
					echo '该文章已经收藏至'.$al_mark[0]->mark_name.'中';
				}
			?>
			</br>
			</br>
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
			<?= $form->field($comment, 'comment_text')->textarea(['autofocus' => true])->label(false) ?>
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


	
<div class="modal fade " id="modal_newsletter" tabindex="-1" role="dialog" aria-labelledby="modal_newsletter" aria-hidden="true">
	<div class="modal-dialog shadow-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center justify-content-center">
					<h5 class="modal-title">选择-添加收藏夹:</em>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">收藏夹id</th>
							<th scope="col">收藏夹名称</th>
							<th scope="col">收藏在这！</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach  ($old_marks as $mark):?>
						<tr>
							<th scope="row"><?= Html::encode("{$mark->mark_id}") ?></th>
							<th><?= Html::encode("{$mark->mark_name}") ?></th>
							<th style="text-align: center;">
							<?php $form = ActiveForm::begin([
    								'id' => 'mark-form',
									'action' => ['site/mark'],
    								'fieldConfig' => [
    								'template' => "{label}\n{input}\n{error}",
    								'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    								'inputOptions' => ['class' => 'col-lg-16 form-control'],
    								'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
								],]);?>
								<?= Html::submitButton('收藏', ['class' => 'btn btn-primary', 'name' => 'mark-button'.$mark->mark_id]) ?>
								<?= $form->field($markr, 'post_id')->hiddenInput()->label(false);?>
								<?php ActiveForm::end(); ?>
							</br>
							</th>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<div class="row justify-content-center align-items-center">
					<div class="col-md-12 mb-3 text-center">
						<small class="d-block" style="color:#ccc;font-style:italic;line-height:1.4;">注：一篇文章仅能够在用户的一个收藏夹内，请选择收藏夹，如欲更换收藏夹，请先前往个人空间删除收藏记录</small>
					</div>
				</div>
				<div class="row justify-content-center d-none mt-3">
					<label class="c-input c-checkbox small">
					<input type="checkbox" name="gdpr" id="gdpr" checked="checked">
					<span class="c-indicator"></span> I agree to the <a target="_blank" href="https://www.wowthemes.net/privacy-policy/#newsletter-subscription-forms">privacy policy</a>. </label>
				</div>
			</div>
		</div>
	</div>
</div>