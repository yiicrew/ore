<?php

use yii\helpers\Html;

?>
<section class="section news">
    <h2 class="section-heading"><?= Yii::t('app', 'Latest Property News') ?></h2>
    <div class="section-body news-articles">
    <?php foreach ($articles as $article): ?>
        <article class="article article-news" data-id="<?= $article->id ?>">
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
