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
 * @property string $file_path
 * @property string $public_file_path
 * @property integer $sort_order
 * @property integer $is_default
 * @property string $created_at
 * @property string $updated_at
 */
class ListingImage extends \yii\db\ActiveRecord
{
    const DEFAULT = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listing_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id', 'user_id', 'sort_order', 'is_default'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['file_path', 'public_file_path'], 'string', 'max' => 255],
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
            'file_path' => Yii::t('app', 'File Path'),
            'public_file_path' => Yii::t('app', 'Public File Path'),
            'sort_order' => Yii::t('app', 'sort_order'),
            'is_default' => Yii::t('app', 'Is Default'),
            'created_at' => Yii::t('app', 'Date Created'),
            'updated_at' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * @inheritdoc
     * @return ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListingImageQuery(get_called_class());
    }

    public function __toString()
    {
        return Url::to('/uploads/objects/' . $this->listing_id . '/modified/full_' . $this->public_file_path);
    }
}
