<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Apartment]].
 *
 * @see Apartment
 */
class ApartmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Apartment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Apartment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
