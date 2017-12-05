<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;
use app\widgets\Apartment;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="search col-lg-10">
                <h1 class="search-heading">Search properties for sale</h1>
                <form class="search-form form-inline">
                    <div class="form-group search-form-group">
                        <select class="form-control search-type" name="type">
                            <option value="buy">Buy</option>
                            <option value="rent">Rent</option>
                        </select>
                        <input type="text" class="form-control search-query" name="q" placeholder="Search by location or keyword">
                        <button type="submit" class="btn search-btn">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?= Apartment::widget([
        'limit' => 12
    ]) ?>

    <?= News::widget([
        "limit" => 2
    ]) ?>

</div>