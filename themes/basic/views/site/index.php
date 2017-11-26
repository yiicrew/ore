<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;

$this->title = Yii::$app->name . ' - Real Estate Software';
?>

<div class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="search col-lg-10">
                <h1 class="search-heading">Search properties for sale</h1>
                <form class="search-form form-inline">
                    <div class="form-group search-form-group">
                        <select class="form-control search-type">
                            <option>Buy</option>
                        </select>
                        <input type="text" class="form-control search-query" placeholder="Search by location or keyword">
                        <button type="submit" class="btn search-btn">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?= News::widget([
        "limit" => 2
    ]) ?>
</div>