<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\widgets\DetailView;
/** @var yii\web\View $this */

$this->title="团队介绍";
?>

<div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <h2><strong>团队介绍</strong></h2>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <p style="font-size:15px;">
                    我们的团队名称是汪汪队，成员有万泽生、黄韵竹、刘扬三个人，可以在导航栏的”作业展示>>个人作业“中查看我们的个人作业及其他学号、班级信息。
                    <br><br>
                    我们按照项目要求使用yii框架和mysql数据库来搭建这个网站，其中数据库总共包含了14张表，在首页中展示了动态地图，并在页脚中放入了GitHub项目的链接。
                    本网站专注于核污染新闻，为公众提供及时、准确、权威的信息，目标是打造一个高质量、高效率、高安全性的核污染新闻平台，为社会做出贡献。
                </p>
            </div>
        </div>
</div>

