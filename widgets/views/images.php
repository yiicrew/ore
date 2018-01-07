<?php

use yii\helpers\Html;
use app\models\Image;

?>
<!-- @TODO: fix image preview -->
<?php if (!empty($images) && false): ?>
    <div class="gallery">
    <?php foreach ($images as $image): ?>
        <?php if ($withMain && $image->is_default || !$withMain && !$image->is_default || !$image->is_default): ?>
        <div class="gallery-item">
        <?= Html::a(
            Html::img(Image::getThumbUrl($image, 150, 100), Image::getAlt($image)), 
            Image::getFullSizeUrl($image), [
            'data-gal' => 'prettyPhoto[img-gallery]',
            'title' => Image::getAlt($image),
            'alt' => Image::getAlt($image),
        ]) ?>
        </div>
        <?php endif ?>
    <?php endforeach ?>
    </div>
<?php endif ?>