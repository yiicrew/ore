<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $image_path
 * @property string $icon_path
 * @property integer $sort_order
 * @property string $created_at
 * @property string $updated_at
 * @property integer $type
 * @property string $name_en
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'type'], 'integer'],
            [['created_at', 'updated_at', 'type', 'name_en'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['image_path', 'icon_path', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'image_path' => Yii::t('app', 'Image Path'),
            'icon_path' => Yii::t('app', 'Icon Path'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'type' => Yii::t('app', 'Type'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }

    public function __toString()
    {
        return $this->name_en;
    }
}
