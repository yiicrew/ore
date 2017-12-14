<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entries_image".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_created
 */
class ArticleImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date_created' => Yii::t('app', 'Date Created'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArticleImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleImageQuery(get_called_class());
    }
}
