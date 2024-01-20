<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="/frontendassets/img/favicon.ico">
<link rel="icon" type="image/png" href="/frontendassets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>用户登录界面</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,600,800" rel="stylesheet">
    
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
<!-- Main CSS -->
<link href="/frontendassets/css/main.css" rel="stylesheet"/>
    
<!-- Animation CSS -->
<link href="/frontendassets/css/vendor/aos.css" rel="stylesheet"/>
    
</head>
    
<body> 
    
    
<!--------------------------------------
NAVBAR
--------------------------------------->
<nav class="topnav navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<div class="container-fluid">
	<a class="navbar-brand d-sm-block d-md-none" href="./index.html"><i class="fas fa-anchor mr-2"></i><strong>Anchor UI</strong> Kit</a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02" style="">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li class="nav-item">
			<a class="nav-link" href="/index.php">首页</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<!-- End Navbar -->
    
<!-- Main -->
<div class="d-md-flex h-md-100 align-items-center">
	<div class="col-md-6 p-0 bg-indigo h-md-100">
		<div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
			<div class="logoarea pt-5 pb-5">
				<p>
					<i class="fa fa-anchor fa-3x"></i>
				</p>
				<h1 class="mb-0 mt-3 display-4">新闻站</h1>
				<h5 class="mb-4 font-weight-light">了解天下大事<i class="fab fa-sass fa-2x text-cyan"></i></h5>
				<a class="btn btn-outline-white btn-lg btn-round" href="#" data-toggle="modal" data-target="#modal_newsletter">注册账号
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-6 p-0 bg-white h-md-100 loginarea">

    <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
    <?= $content ?>
	</div>
	</div>
</div>
<!-- End Main -->
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->    
<script src="/frontendassets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/functions.js" type="text/javascript"></script>
    
<!-- Animation -->
<script src="/frontendassets/js/vendor/aos.js" type="text/javascript"></script>
<noscript>
    <style>
        *[data-aos] {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
</noscript>
<script>
    AOS.init({
        duration: 700
    });
</script>
 
<!-- Disable animation on less than 1200px, change value if you like -->
<script>
AOS.init({
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

