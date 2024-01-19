<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "我的收藏记录";
?>

<?php foreach  (array_keys($mark_data) as $bookmark):?>
    <h2 class="page-title"><?= Html::encode("{$bookmark}") ?></h2>
    </br>
    <div id="table-default" class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><button class="table-sort" data-sort="sort-name">收藏文章名称</button></th>
                    <th><button class="table-sort" data-sort="sort-city">收藏文章作者</button></th>
                    <th><button class="table-sort" data-sort="sort-type">查看收藏文章</button></th>
                    <th><button class="table-sort" data-sort="sort-type">删除收藏文章</button></th>
                </tr>
            </thead>
            <tbody class="table-tbody">
            <?php foreach  ($mark_data[$bookmark] as $markrecord):?>
                <tr>
                    <td class="sort-name"><?= Html::encode("{$markrecord->post->post_title}") ?></td>
                    <td class="sort-city"><?= Html::encode("{$markrecord->post->user->username}") ?></td>
                    <td>
                        <a href=<?= Html::encode("/index.php/?r=site/passage&blog_id={$markrecord->post->post_id}") ?> class="btn btn-outline-primary w-100">
                            阅读该文章
                        </a>
                    </td>
                    <td>
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
        			<?= Html::submitButton('删除文章', ['class' => 'btn btn-outline-danger w-100', 'name' => 'delete-record'.'-'.$markrecord->mark_id.'-'.$markrecord->post_id]) ?>
			        <?php ActiveForm::end(); ?>
                    </td>    
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</br>
<?php endforeach;?>
