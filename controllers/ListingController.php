<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Listing;

class ListingController extends Controller
{
    public $layout = "column1";

    public function actionView($id)
    {
        $listing = Listing::findOne($id);

        return $this->render('view', [
            'listing' => $listing,
        ]);
    }
}
