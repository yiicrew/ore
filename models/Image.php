<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $id_object
 * @property integer $id_owner
 * @property string $file_name
 * @property string $file_name_modified
 * @property integer $sorter
 * @property integer $is_main
 * @property string $date_created
 * @property string $date_updated
 */
class Image extends \yii\db\ActiveRecord
{
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
            [['id_object', 'id_owner', 'sorter', 'is_main'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['file_name', 'file_name_modified'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_object' => Yii::t('app', 'Id Object'),
            'id_owner' => Yii::t('app', 'Id Owner'),
            'file_name' => Yii::t('app', 'File Name'),
            'file_name_modified' => Yii::t('app', 'File Name Modified'),
            'sorter' => Yii::t('app', 'Sorter'),
            'is_main' => Yii::t('app', 'Is Main'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
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
        return Url::to('/uploads/objects/' . $this->id_object . '/modified/full_' . $this->file_name_modified);
    }
}
