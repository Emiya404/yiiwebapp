<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Blogpost $model */

$this->title = 'Create Blogpost';
$this->params['breadcrumbs'][] = ['label' => 'Blogposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
