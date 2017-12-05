<?php
namespace app\widgets;

use Yii;
use yii\bootstrap\Widget;
use app\models\User;

class Apartment extends Widget
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
        $apartments = \app\models\Apartment::find()
            ->limit($this->limit)
            ->active()
            ->all();

        $heading = $this->heading ?? Yii::t('app', 'Featured Properties');

        return $this->render('apartment', [
            'apartments' => $apartments,
            'heading' => $heading
        ]);
    }
}
