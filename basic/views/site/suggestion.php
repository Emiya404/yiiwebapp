<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\widgets\DetailView;
use app\models\Suggestion;
/** @var yii\web\View $this */

$this->title="留言建议";
?>

<div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<?= Html::encode("发送一条友善的评论") ?>
			<?php 
				$form = ActiveForm::begin([
    				'id' => 'suggestion-form',
    				'fieldConfig' => [
    				'template' => "{label}\n{input}\n{error}",
    				'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    				'inputOptions' => ['class' => 'col-lg-16 form-control'],
    				'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
				],]); 
			?>
			<?= $form->field($suggest, 'suggestion_text')->textarea(['autofocus' => true]) ?>
			<div class="form-group">
    			<div>
        			<?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
   				</div>
			</div>
			<?php ActiveForm::end(); ?>
			<?php foreach ($old_suggest as $suggestion):
    			$user_id=$suggestion->suggestion_user;
    			$user_name=User::findOne(["user_id"=>$user_id])->username;
    		?>
    			<div class="card shadow-lg border-0">
        		<div class="card-body">
            	<h5 class="card-title"> <?= Html::encode("{$user_name}") ?> </h5>
                		<p class="card-text text-muted">
                    		<?= Html::encode("{$suggestion->suggestion_text}") ?>
                		</p>
        			</div>
    			</div>
    			</br>
 			<?php endforeach; ?>
		</div>
	</div>
</div>


	
