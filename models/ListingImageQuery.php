<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Image]].
 *
 * @see Image
 */
class ListingImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function default()
    {
        return $this->andWhere(['is_default' => ListingImage::DEFAULT]);
    }

    /**
     * @inheritdoc
     * @return ListingImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ListingImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
