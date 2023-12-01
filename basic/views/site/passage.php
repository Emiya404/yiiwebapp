<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
$this->title="Passage";
?>


<div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<article>
			<h1><strong><?= Html::encode("{$blogpost[0]->title}") ?></strong>
            <h3></h3>
			<p>
            <?= Html::encode("{$blogpost[0]->content}") ?>
			</p>
			</article>
		</div>
	</div>
</div>