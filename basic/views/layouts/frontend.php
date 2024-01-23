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
<title>Anchor Bootstrap 4.1.3 UI Kit by WowThemesNet</title>
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
    
<!----------------------------------------------------------------------
NAVBAR (remove topnav if you don't want changed nav background on scroll)
------------------------------------------------------------------------>
<nav class="topnav navbar navbar-expand-lg navbar-dark fixed-top">
<div class="container-fluid">
	<a class="navbar-brand" href="#"><i class="fas fa-anchor mr-2"></i><strong>新闻主页</strong></a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02" style="">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li class="nav-item">
				<a class="nav-link" href="/index.php?r=site/team">团队介绍</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?r=site/suggestion">留言</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?r=site/blog">博客</a>
			</li>
			<!--作业menu-->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					作业展示 
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="?r=site/pwork">个人作业</a>
					<a class="dropdown-item" href="?r=site/twork">团队作业</a>
				</div>
			</li>
					<?php
						if(Yii::$app->user->isGuest){
							echo '<li class="nav-item"> <a class="nav-link" href="index.php?r=site/login">用户登录</a> </li>';
						}else{
							echo '<li class="nav-item">'. Html::beginForm(['/site/logout']). Html::submitButton('用户退出 (' . Yii::$app->user->identity->username . ')',['class' => 'nav-link btn btn-link logout']). Html::endForm(). '</li>';
						}
					?>
		</ul>
		<ul class="navbar-nav ml-auto d-flex align-items-center">
			<li class="nav-item">
			<span class="nav-link" href="#">
			<?php
				$site_button_href=Yii::$app->user->isGuest?"index.php?r=site/login":"index.php?r=blogpost";
				$site_button_text=Yii::$app->user->isGuest?"加入新闻站":"个人中心";
			?>
			<?php
				if(Yii::$app->user->isGuest){
					echo '<li class="nav-item">'. Html::beginForm(['/site/login']). Html::submitButton('Login',['class' => 'nav-link btn btn-link logout']). Html::endForm().'</li>';
				}else{
					echo '<li class="nav-item">'. Html::beginForm(['/userspace/index']). Html::submitButton(' ' . Yii::$app->user->identity->username . '的个人中心',['class' => 'nav-link btn btn-link logout']). Html::endForm(). '</li>';
				}
			?>
			</a>
			</span>
			</li>
		</ul>
	</div>
</div>
</nav>
<!-- End Navbar -->
    
    
<!-------------------------------------
HEADER
--------------------------------------->
<header>
	<div class="jumbotron jumbotron-xl jumbotron-fluid overlay overlay-blue" style="background-size:cover; background-image:url(/frontendassets/img/demo/1.jpg);">
	<div class="container text-center text-white h-100">
		<h1 class="display-2">环境保护-核污染 <strong>新闻站</strong></h1>
		<h5 class="font-weight-light">Free Bootstrap 4.1.3<strong> UI Kit</strong> with <strong><i class="fab fa-sass fa-2x"></i></strong> for rapid development</h5>
	</div>
	<p class="bottom-align-text-absolute">
		<span class="d-block text-center text-white">Made with <i class="fas fa-heart text-danger"></i> by WOW Themes</span>
	</p>
	</div>
</header>
<!--- END HEADER -->
<?= $content ?>
<!--------------------------------------
FOOTER
--------------------------------------->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
<path class="bg-black" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<footer class="bg-black pb-5">
<div class="container">
	<div class="row">
		<div class="col-12 col-md mr-4">
			<i class="fas fa-copyright text-white"></i>
			<small class="d-block mt-3 text-muted">©
			<script>document.write(new Date().getFullYear())</script>
			 Anchor Bootstrap UI Kit,  by Sal <a target="_blank" href="https://www.wowthemes.net">@wowthemesnet</a>. License MIT.
			</small>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Features</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Cool stuff</a></li>
				<li><a class="text-muted" href="#">Random feature</a></li>
				<li><a class="text-muted" href="#">Team feature</a></li>
				<li><a class="text-muted" href="#">Stuff for developers</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Resources</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Resource</a></li>
				<li><a class="text-muted" href="#">Resource name</a></li>
				<li><a class="text-muted" href="#">Another resource</a></li>
				<li><a class="text-muted" href="#">Final resource</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Utilities</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Business</a></li>
				<li><a class="text-muted" href="#">Education</a></li>
				<li><a class="text-muted" href="#">Government</a></li>
				<li><a class="text-muted" href="#">Gaming</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">About</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Team</a></li>
				<li><a class="text-muted" href="#">Locations</a></li>
				<li><a class="text-muted" href="#">Privacy</a></li>
				<li><a class="text-muted" href="#">Terms</a></li>
			</ul>
		</div>
	</div>
</div>
</footer>

    
    
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->    
<script src="/frontendassets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="/frontendassets/js/vendor/share.js" type="text/javascript"></script>
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
    
<!-- Carousel Height Smooth -->
<script>    
    $('.carousel').on('slide.bs.carousel', function (event) {
      var height = $(event.relatedTarget).height();
      var $innerCarousel = $(event.target).find('.carousel-inner');
      $innerCarousel.animate({
        height: height
      });
    });
    </script>
    
<!-- Popovers -->
<script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
    $('.popover-dismiss').popover({
      trigger: 'focus'
    })
    </script>
    
<!-- Tooltips -->
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
