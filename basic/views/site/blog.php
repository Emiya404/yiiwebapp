<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
$this->title="Blogs"
?>
<div class="container">
	<div class="row">        
<?php foreach ($blogposts as $blogpost):
$display_str=substr($blogpost->content,0,101);
$passage_addr="/index.php/?r=site/passage&blog_id="."$blogpost->post_id";?>
<div class="col-lg-6">
<div class="card flex-md-row mb-4 box-shadow h-xl-300">
    <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-purple">News</strong>
        <h3 class="mb-0">
        <a class="text-dark" href="#"><?= Html::encode("{$blogpost->title}") ?></a>
        </h3>
        <div class="mb-1 text-muted">
            Nov 12
        </div>
        <p class="card-text mb-auto">
        <?= Html::encode("{$display_str}") ?>
        </p>
        <a class="text-gray" href=<?= Html::encode("{$passage_addr}") ?>>Continue reading</a>
    </div>
    <img class="card-img-right flex-auto d-none d-md-block" src="/frontendassets/img/demo/blog1.jpg">
</div>
</div>
<?php endforeach; ?>
	</div>
</div>

