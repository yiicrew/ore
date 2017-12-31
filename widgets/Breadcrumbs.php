<?php

namespace app\widgets;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $itemTemplate = '<li class="breadcrumb-item">{link}</li>';

    public $activeItemTemplate = '<li class="breadcrumb-item active">{link}</li>';
}