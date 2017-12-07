<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;
use app\widgets\FeaturedListings;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="search col-lg-10">
                <h1 class="search-heading">Search properties for sale</h1>
                <form class="search-form">
                    <div class="form-group search-form-group">
                        <select class="form-control search-filter search-type" name="type">
                            <option value="buy">Buy</option>
                            <option value="rent">Rent</option>
                        </select>
                        <input type="text" class="form-control search-query" name="q" placeholder="Search by location or keyword">
                        <button type="submit" class="btn btn-primary search-btn">Search</button>
                    </div>
                    <div class="form-group search-form-group search-filters">
                        <select class="form-control search-filter search-category" name="category">
                            <option value="">Property type</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="commercial">Commercial</option>
                            <option value="villa">Villa</option>
                        </select>
                        <select class="form-control search-filter search-beds" name="beds_min">
                            <option value="">Beds - min</option>
                            <option value="0">Studio</option>
                            <option value="1">1 beds</option>
                            <option value="2">2 beds</option>
                            <option value="3">3 beds</option>
                            <option value="4">4 beds</option>
                        </select>
                        <select class="form-control search-filter search-beds" name="beds_max">
                            <option value="">Beds - max</option>
                            <option value="0">Studio</option>
                            <option value="1">1 beds</option>
                            <option value="2">2 beds</option>
                            <option value="3">3 beds</option>
                            <option value="4">4 beds</option>
                        </select>
                        <select class="form-control search-filter search-price" name="price_min">
                            <option value="">Price - min</option>
                            <option value="0">0</option>
                        </select>
                        <select class="form-control search-filter search-price" name="price_max">
                            <option value="">Price - max</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?= FeaturedListings::widget([
        'limit' => 9
    ]) ?>

    <?= News::widget([
        "limit" => 2
    ]) ?>

</div>