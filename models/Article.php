<?php

namespace app\models;

use Yii;
use yii\helpers\StringHelper;
use yii\helpers\Inflector;
use yii\helpers\Url;

/**
 * This is the model class for table "entries".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $status
 * @property string $created_at
 * @property string $upated_at
 * @property string $title_en
 * @property string $body_en
 * @property string $announce_en
 * @property string $tags_en
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'category_id'], 'integer'],
            [['tags_en', 'body_en', 'announce_en'], 'string'],
            [['created_at', 'upated_at'], 'safe'],
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
            'status' => Yii::t('app', 'Status'),
            'category_id' => Yii::t('app', 'Category ID'),
            'created_at' => Yii::t('app', 'Date Created'),
            'upated_at' => Yii::t('app', 'Date Updated'),
            'body_en' => Yii::t('app', 'Body En'),
            'title_en' => Yii::t('app', 'Title En'),
            'announce_en' => Yii::t('app', 'Announce En'),
            'tags_en' => Yii::t('app', 'Tags'),
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
        return Url::toRoute(['article/default/view', 
            'slug' => Inflector::slug($this->title_en)
        ]);
    }

    public function getImage()
    {
        return $this->hasOne(ArticleImage::class, ['article_id' => 'id']);
    }

    public function getThumb()
    {
        $image = '';
        if (isset($this->image)) {
            $image = $this->image->file_path;
        }

        return Yii::getAlias('@web') . '/uploads/articles/thumb_480x480_' . $image;
    }

    public function getSummary()
    {
        return StringHelper::truncate($this->body_en, 150);
    }

    public function getPublishedAt()
    {
        return strtoupper(
            date('d M Y', strtotime($this->created_at))
        );
    }
}
