<?php

/* @var $this yii\web\View */
// *18* отображает путь к файлу

use yii\helpers\Html;

$this->title = 'About';     //Заголовок (во вкладке)
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        The first attempts of a batted-head autistic person to do something
    </p>

    <code><?= __FILE__ ?></code>    
</div>
