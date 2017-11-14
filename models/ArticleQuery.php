<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Article]].
 *
 * @see Article
 */
class ArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    public function latestNews()
    {
        // @TODO: make limit configurable from config or admin
        return $this->andWhere(['category_id' => ArticleCategory::NEWS])
            ->limit(4)
            ->orderBy([
                'date_created' => SORT_DESC
            ]);
            //->with('image');
    }

    /**
     * @inheritdoc
     * @return Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
