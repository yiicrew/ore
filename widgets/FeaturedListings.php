<?php
namespace app\widgets;

use Yii;
use yii\bootstrap\Widget;
use app\models\User;
use app\models\Listing;

class FeaturedListings extends Widget
{
    /**
     * @var Limit the number of rows
     */
    public $limit = 10;

    /**
     * @var Widget heading
     */
    public $heading;

    public function run()
    {
        $listings = Listing::find()
            ->limit($this->limit)
            ->active()
            ->orderBy(['price' => SORT_DESC])
            ->all();

        $heading = $this->heading ?? Yii::t('app', 'Featured Properties');

        return $this->render('listing', [
            'listings' => $listings,
            'heading' => $heading
        ]);
    }
}
