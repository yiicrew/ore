<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="hero">

    <div class="search">
        <h1 class="search-heading">Search properties for sale</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

</div>

<aside class="page-aside">
<?php if (!empty($latestNews)): ?>
<section class="news">
    <h2 class="news-heading"><?= Yii::t('app', 'Latest Property News') ?></h2>
    <div class="news-articles">
    <?php foreach ($latestNews as $article): ?>
        <article class="article article-news">
            <div class="article-media">
                <?= Html::img($article->thumb, [
                    'width' => 250,
                    'height' => 250,
                    'class' => 'article-image',
                    'alt' => $article->title_en
                ]) ?>
            </div>
            <div class="article-content">
                <h4 class="article-title">
                    <?= $article->title_en ?>
                </h4>
                <time class="article-date">
                    <?= $article->publishedAt ?>
                </time>
                <div class="article-summary">
                    <?= $article->summary ?>
                </div>
            </div>
            <?= Html::a($article->title_en, $article->url, [
                'class' => 'article-link',
                'title' => $article->title_en
            ]) ?>
        </article>
    <?php endforeach ?>
    </div>
</section>
<?php endif ?>
</aside>
