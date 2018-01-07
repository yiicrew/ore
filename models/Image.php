<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $listing_id
 * @property string $path
 * @property string $public_path
 * @property integer $sort_order
 * @property integer $is_default
 * @property string $created_at
 * @property string $updated_at
 * @property string $alt_en
 */
class Image extends \yii\db\ActiveRecord
{
    const DEFAULT = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id', 'user_id', 'sort_order', 'is_default'], 'integer'],
            [['created_at', 'updated_at', 'alt_en'], 'safe'],
            [['path', 'public_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'listing_id' => Yii::t('app', 'Listing Id'),
            'user_id' => Yii::t('app', 'User Id'),
            'path' => Yii::t('app', 'File Path'),
            'public_path' => Yii::t('app', 'Public File Path'),
            'sort_order' => Yii::t('app', 'sort_order'),
            'is_default' => Yii::t('app', 'Is Default'),
            'created_at' => Yii::t('app', 'Date Created'),
            'updated_at' => Yii::t('app', 'Date Updated'),
            'alt_en' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @inheritdoc
     * @return ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageQuery(get_called_class());
    }

    public function __toString()
    {
        return Url::to('/uploads/listings/' . $this->listing_id . '/modified/full_' . $this->public_path);
    }

    public function getThumb()
    {
        ['alt' => $alt, 'thumbUrl' => $thumbUrl, 'link' => $link] = Images::getMainThumb(300, 200, $data->images);
        $alt = $alt ?? $this->hTitle;
        $image = Html::img($thumbUrl, $alt);
        if ($link) {
            return Html::a($image, $link, ['title' => $alt]);
        }

        return $image;
    }

    public function getAlt()
    {
        return $this->alt_en;
    }
}
