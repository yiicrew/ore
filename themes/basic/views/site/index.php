<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;
use app\widgets\FeaturedListings;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<?= FeaturedListings::widget([
    'limit' => 9
]) ?>

<?= News::widget([
    "limit" => 2
]) ?>