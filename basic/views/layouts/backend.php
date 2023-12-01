<?php 
/*
  developed by WanZesheng 10.27, choose a framework writen by html,css and js.
  
*/
?>
<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\BackendAsset;
use yii\bootstrap5\Html;


BackendAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Introduction - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="/backendassets/css/tabler.min.css?1668287865" rel="stylesheet"/>
    <link href="/backendassets/css/tabler-flags.min.css?1668287865" rel="stylesheet"/>
    <link href="/backendassets/css/tabler-payments.min.css?1668287865" rel="stylesheet"/>
    <link href="/backendassets/css/tabler-vendors.min.css?1668287865" rel="stylesheet"/>
    <link href="/backendassets/css/demo.min.css?1668287865" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    <?= Html::csrfMetaTags() ?>
  </head>
  <body>
    <script src="/backendassets/js/demo-theme.min.js?1668287865"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="#">
              <h1>后台管理系统</h1>
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
              <div class="btn-list">
                <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                  后台框架代码
                </a>
              </div>
            </div>
            <div class="d-none d-md-flex">
              <a id="dark_url" href="#" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a id="day_url" href="#" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                  <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Last updates</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
                var change_theme_function=function(themea){
                  var current_url = window.location.href;
                  var url_parts = current_url.split("?");
                  var base_url = url_parts[0];
                  var url_params = url_parts[1];
                  if(!url_params){
                    return base_url+"?theme="+themea;
                  }
                  else{
                    var param_array=url_params.split("&");
                    var new_params=[];
                    for(var i=0;i<param_array.length;i++){
                      var key=param_array[i].split("=")[0];
                      if(key!="theme"){
                        new_params.push(param_array[i]);
                      }
                    }
                    return base_url+"?"+new_params.join("&")+"&theme="+themea;
                  }
                }
                document.getElementById("day_url").href=change_theme_function("light");
                document.getElementById("dark_url").href=change_theme_function("dark");
            </script>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(/backendstatic/avatars/1.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Emiya</div>
                  <div class="mt-1 small text-muted">后台设计者</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Status</a>
                <a href="#" class="dropdown-item">Profile</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php?r=user" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                      <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M19.001 15.5v1.5" />
                      <path d="M19.001 21v1.5" />
                      <path d="M22.032 17.25l-1.299 .75" />
                      <path d="M17.27 20l-1.3 .75" />
                      <path d="M15.97 17.25l1.3 .75" />
                      <path d="M20.733 20l1.3 .75" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      平台用户管理
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?r=blogpost" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                      <path d="M7 8h10" />
                      <path d="M7 12h10" />
                      <path d="M7 16h10" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      平台文章管理
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?r=comments" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" />
                      </svg>
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      平台评论管理
                    </span>
                  </a>
                </li>
              </ul>
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                <form action="../" method="get" autocomplete="off" novalidate>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                    </span>
                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  快捷功能
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row gx-lg-5">
              <div class="d-none d-lg-block col-lg-3">
                <ul class="nav nav-pills nav-vertical">
                  <li class="nav-item">
                    <a href="/index.php?r=blogpost%2Fcreate" class="nav-link">
                      添加文章
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/index.php?r=user%2Fcreate" class="nav-link">
                      添加用户
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/index.php?r=comments%2Fcreate" class="nav-link">
                      添加评论
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/index.php?r=user" class="nav-link">
                      用户一览
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/index.php?r=blogpost" class="nav-link">
                      文章一览
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/index.php?r=comments" class="nav-link">
                      评论一览
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-9">
                <div class="card card-lg">
                  <div class="card-body">
                  <?= $content?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="../docs/" class="link-secondary">Documentation</a></li>
                  <li class="list-inline-item"><a href="../license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2022
                    <a href=".." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="../changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta16
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="/backendassets/js/tabler.min.js?1668287865" defer></script>
    <script src="/backendassets/js/demo.min.js?1668287865" defer></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
