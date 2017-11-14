<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entries".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $category_id
 * @property string $tags
 * @property integer $image_id
 * @property string $date_created
 * @property string $date_updated
 * @property string $body_en
 * @property string $title_en
 * @property string $announce_en
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'category_id', 'image_id'], 'integer'],
            [['tags', 'body_en', 'announce_en'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'active' => Yii::t('app', 'Active'),
            'category_id' => Yii::t('app', 'Category ID'),
            'tags' => Yii::t('app', 'Tags'),
            'image_id' => Yii::t('app', 'Image ID'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'body_en' => Yii::t('app', 'Body En'),
            'title_en' => Yii::t('app', 'Title En'),
            'announce_en' => Yii::t('app', 'Announce En'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

    public function getUrl()
    {
        return Yii::$app->urlManager->createAbsoluteUrl('/entries/main/view', [
            'url' => $this->title_en . '.html',
        ]);
    }
}
