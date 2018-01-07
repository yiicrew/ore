<?php

namespace app\widgets;

use Yii;
use yii\bootstrap\Widget;

class ImageWidget extends Widget
{
    public $objectId;
    public $images;
    public $withMain = false;
    public $useFotorama = true;

    public function run()
    {
        $this->registerAssets();
        $this->render('images', [
            'images' => $this->images,
            'withMain' => $this->withMain
        ]);
    }

    public function registerAssets()
    {
        /*
        $assets = dirname(__FILE__) . '/../assets';
        $baseUrl = Yii::$app->assetManager->publish($assets);

        if (is_dir($assets)) {
            if ($this->useFotorama) {
                Yii::$app->clientScript->registerCoreScript('jquery');
                Yii::$app->clientScript->registerCssFile($baseUrl . '/fotorama/fotorama.css');
                Yii::$app->clientScript->registerScriptFile($baseUrl . '/fotorama/fotorama.js', CClientScript::POS_BEGIN);
            } else {
                Yii::$app->clientScript->registerCoreScript('jquery');
                Yii::$app->clientScript->registerCssFile($baseUrl . '/prettyphoto/css/prettyPhoto.css');
                Yii::$app->clientScript->registerScriptFile($baseUrl . '/prettyphoto/js/jquery.prettyPhoto.js', CClientScript::POS_BEGIN);
                Yii::$app->clientScript->registerScript('prettyPhotoInit', '
                $("a[data-gal^=\'prettyPhoto\']").prettyPhoto(
                    {
                        animation_speed: "fast",
                        slideshow: 10000,
                        hideflash: true,
                        social_tools: "",
                        gallery_markup: "",
                        slideshow: 3000,
                        autoplay_slideshow: false,
                        deeplinking: false,
                        hook: "data-gal",
                        slideshow: false
                    }
                );
            ', CClientScript::POS_READY);
            }

        } else {
            throw new Exception('Image - Error: Couldn\'t find assets folder to publish.');
        }
        */
    }
}
