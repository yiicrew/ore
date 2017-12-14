<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Listing]].
 *
 * @see Listing
 */
class ListingQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->where([
            'status' => Listing::STATUS_ACTIVE,
            'owner_active' => Listing::STATUS_ACTIVE
        ]);
    }

    /**
     * @inheritdoc
     * @return Listing[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Listing|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
