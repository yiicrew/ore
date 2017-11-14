<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>


    <?php if (!empty($latestNews)): ?>
    <section class="articles articles-latest">
        <h2 class="articles-heading"><?= Yii::t('app', 'News') ?></h2>
        <?php foreach ($latestNews as $article): ?>
            <article class="news">
                <time class="news-timestamp">
                    <?= $article->date_created ?>
                </time>
                <h4 class="news-title">
                    <?= Html::a($article->title_en, $article->url) ?>
                </h4>
            </article>
        <?php endforeach ?>
    </section>
    <?php endif;?>

</div>