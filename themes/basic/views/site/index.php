<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="jumbotron">
    <h1>Congratulations!</h1>
    <p class="lead">You have successfully created your Yii-powered application.</p>
    <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
</div>

<aside class="page-aside">
<?php if (!empty($latestNews)): ?>
<section class="news">
    <h2 class="news-heading"><?= Yii::t('app', 'Latest Property News') ?></h2>
    <div class="news-list">
    <?php foreach ($latestNews as $article): ?>
        <article class="article article-news">
            <div class="article-media">
                <?= Html::img($article->thumb, [
                    'width' => 200,
                    'height' => 200
                ]) ?>
            </div>
            <div class="article-content">
                <h4 class="article-title">
                    <?= $article->title_en ?>
                </h4>
                <time class="article-timestamp">
                    <?= $article->date_created ?>
                </time>
                <p class="article-summary">
                    <?= $article->summary ?>
                </p>
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
