<?php
/* @var $this yii\web\View */
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\helpers\Html;

$searchUrl = Yii::$app->session->get('searchUrl');
$isSearchPage = stripos(Yii::$app->request->referrer, Yii::$app->urlManager->getBaseUrl(true));

$this->title = $listing->metaTitle;
$this->params['description'] = $listing->metaDescription;
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Apartment search'),
		'url' => $searchUrl ?? ['/quicksearch/main/mainsearch']
	],
    $listing->titleShort
];
?>
<section class="listing">
    <header class="listing-header">
        <div class="listing-toolbar list">
            <?php if ($searchUrl || $isSearchPage): ?>
            <a href="<?= $searchUrl ?? '#' ?>" <?= $isSearchPage ? 'onclick="window.history.back(); return false;"' : '' ?>">
                <img src="<?= Url::to('/images/design/back2search.png') ?>" alt="<?= Yii::t('app', 'Go back to search results') ?>">
            </a>
            <?php endif ?>

            <a href="<?= $listing->printUrl ?>" target="_blank">
                <img src="<?= Url::to('/images/design/print.png') ?>" alt="<?= Yii::t('app', 'Print version') ?>">
            </a>

            <?php if ($listing->editUrl): ?>
            <a href="<?= $listing->editUrl ?>">
                <img src="<?= Url::to('/images/design/edit.png') ?>" alt="<?= Yii::t('app', 'Update apartment') ?>">
            </a>
            <?php endif ?>
        </div>

        <h1 class="listing-title"><?= $listing->title ?></h1>
        <!-- @TODO: fix this rating for listings -->
        <?php if ($listing->rating && false): ?>
        <div class="listing-rating">
            <?php StartRating::widget([
                'name' => 'rating-' . $model->id,
                'id' => 'rating-' . $model->id,
                'value' => intval($listing->rating),
                'readOnly' => true,
                'minRating' => Comment::MIN_RATING,
                'maxRating' => Comment::MAX_RATING,
            ]); ?>
        </div>
        <?php endif ?>

        <div class="listing-stats">
        <?php if (isset($stats) && is_array($stats)) : ?>
            <?= Yii::t('app', 'Views') ?>: <?= Yii::t('app', 'views_all') . ' ' . $stats['all'] ?>, 
            <?= Yii::t('app', 'views_today') . ' ' . $stats['today'] . '.&nbsp;' ?>
            <?= '&nbsp;' . Yii::t('app', 'Date created') . ': ' . $listing->created_at ?>
        <?php endif; ?>
        </div>
    </header>

    <?= $listing->description_en ?>
</section>


