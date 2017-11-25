<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="hero">
    <div class="search col-lg-9">
        <h1 class="search-heading">Search properties for sale</h1>
        <form class="search-form form-inline">
            <div class="form-group">
                <select class="form-control form-control-lg">
                    <option>Buy</option>
                </select>
                <input type="text" class="form-control form-control-lg" placeholder="Search by location or keyword">
                <button type="submit" class="btn btn-lg btn-success">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="container">
<!-- @TODO: move it to a widget -->
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
</div>
