<?php
/* @var $this yii\web\View */
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $listing->metaTitle;
$this->params['description'] = $listing->metaDescription;

$searchUrl = Yii::$app->session->get('searchUrl');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Apartment search'),
		'url' => $searchUrl ?? ['/quicksearch/main/mainsearch']
	],
	StringHelper::truncate($listing->title, 10),
];
?>
<div class="listing">
    <?php
    if ($searchUrl) {
      echo Html::a(
         Html::img(Url::to('/images/design/back2search.png'), ["alt" => Yii::t('app', 'Go back to search results')]),
         $searchUrl
     );
  } elseif (stripos(Yii::$app->request->referrer, Yii::$app->urlManager->getBaseUrl(true)) !== false) {
        echo Html::a(
            Html::img(
                Url::to('/images/design/back2search.png'), 
                ['alt' => Yii::t('app', 'Go back to search results')]
            ),
            '#', 
            ['onclick' => 'window.history.back(); return false;']
        );
    }


    echo Html::a(
        Html::img(Url::to('/images/design/print.png'), ["alt" => Yii::t('app', 'Print version')]),
        $listing->getUrl().'?printable=1', array('target' => '_blank')
    );


  $editUrl = $listing->getEditUrl();

  if ($editUrl) {
      echo Html::a(
         Html::img(Url::to('/images/design/edit.png'), ["alt" => Yii::t('app', 'Update apartment')]),
         $editUrl
     );
  }
  ?>
  <h1 class="listing-title"><?= $listing->title_en ?></h1>

  <?= $listing->id ?>
</div>


