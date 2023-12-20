<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
$this->title="Blogs"
?>
<div class="container">
    <div class="col-md-6">
		<h4 class="h6 mb-4">标签分类</h4>
        <div>
        <?php foreach ($categories as $category):
            $category_name=$category->category_name;
            $category_url="/?r=site/blog&category=".$category->category_id;
        ?>
		<a class="btn btn-light" href=<?= Html::encode("{$category_url}") ?>><?= Html::encode("{$category_name}") ?></a>
        <?php endforeach; ?>
        </div>
    </div>
    </br>
	<div class="row">        
        <?php foreach ($blogposts as $blogpost):
            $display_str=substr($blogpost->post_text,0,101);
            $passage_addr="/index.php/?r=site/passage&blog_id="."$blogpost->post_id";
            $passage_image=$blogpost->post_image?$blogpost->post_image:'frontendassets\img\demo\1.jpg' ;
         
            $cate_name=$categories[($blogpost->post_type)-1]->category_name;
            ?>
            
            <div class="col-lg-6">
                <div class="card flex-md-row mb-4 box-shadow">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary"><?= Html::encode("{$cate_name}") ?></strong>
                        <div class="flex-fill overflow: hidden">
                            <img src=<?= Html::encode("{$passage_image}") ?> alt="">
                        </div>
                        </br>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#"><?= Html::encode("{$blogpost->post_title}") ?></a>
                        </h3>
                        <div class="mb-1 text-muted">
                            <?= Html::encode("{$blogpost->post_time}") ?>
                        </div>
                        <div class="flex-fill">
                            <p class="card-text mb-auto" >
                                <?= Html::encode("{$display_str}") ?>
                            </p>
                        </div>
                        <a href="<?= Html::encode("{$passage_addr}") ?>" class="btn btn-primary btn-round">阅读更多</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
	</div>
</div>

