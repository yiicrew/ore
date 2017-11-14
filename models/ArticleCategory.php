<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entries_category".
 *
 * @property integer $id
 * @property integer $sorter
 * @property integer $active
 * @property string $date_updated
 * @property string $name_en
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    const NEWS = 1;
    const ARTICLE = 2;
    const DELIMITER_URL = '-';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entries_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sorter', 'active'], 'integer'],
            [['date_updated'], 'safe'],
            [['name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sorter' => Yii::t('app', 'Sorter'),
            'active' => Yii::t('app', 'Active'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArticleCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleCategoryQuery(get_called_class());
    }
}
