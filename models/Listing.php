<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "apartment".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $category_id
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city
 * @property integer $city_id
 * @property integer $view_count
 * @property string $updated_at
 * @property string $created_at
 * @property string $manual_updated_at
 * @property string $activity_end_at
 * @property integer $activity_always
 * @property integer $is_price_poa
 * @property integer $price
 * @property integer $price_to
 * @property integer $num_of_rooms
 * @property integer $floor
 * @property integer $floor_total
 * @property double $square
 * @property double $land_square
 * @property integer $window_to
 * @property integer $living_conditions
 * @property integer $services
 * @property string $berths
 * @property integer $active
 * @property string $lat
 * @property string $lon
 * @property integer $rating
 * @property string $date_up_search
 * @property integer $is_special_offer
 * @property string $is_free_to
 * @property integer $price_type
 * @property integer $sort_order
 * @property integer $owner_active
 * @property integer $owner_id
 * @property string $description_near_en
 * @property string $address_en
 * @property string $title_en
 * @property string $description_en
 * @property string $exchange_to_en
 * @property string $note
 * @property string $phone
 * @property string $vk_post_id
 * @property string $facebook_post_id
 * @property string $twitter_post_id
 * @property integer $count_img
 * @property integer $is_deleted
 * @property integer $parent_id
 */
class Listing extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = -1;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'category_id', 'country_id', 'region_id', 'city', 'city_id', 'view_count', 'activity_always', 'is_price_poa', 'price', 'price_to', 'num_of_rooms', 'floor', 'floor_total', 'window_to', 'living_conditions', 'services', 'active', 'rating', 'is_special_offer', 'price_type', 'sort_order', 'owner_active', 'owner_id', 'count_img', 'is_deleted', 'parent_id'], 'integer'],
            [['updated_at', 'created_at', 'manual_updated_at', 'activity_end_at', 'date_up_search', 'is_free_to'], 'safe'],
            [['square', 'land_square'], 'number'],
            [['description_near_en', 'title_en', 'description_en', 'exchange_to_en', 'note'], 'string'],
            [['berths', 'address_en'], 'string', 'max' => 255],
            [['lat', 'lon'], 'string', 'max' => 25],
            [['phone'], 'string', 'max' => 20],
            [['vk_post_id', 'facebook_post_id', 'twitter_post_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'category_id' => Yii::t('app', 'Category'),
            'country_id' => Yii::t('app', 'Country'),
            'region_id' => Yii::t('app', 'Region'),
            'city_id' => Yii::t('app', 'City'),
            'view_count' => Yii::t('app', 'Views'),
            'updated_at' => Yii::t('app', 'Date Updated'),
            'created_at' => Yii::t('app', 'Date Created'),
            'manual_updated_at' => Yii::t('app', 'Date Manual Updated'),
            'activity_end_at' => Yii::t('app', 'Date End Activity'),
            'activity_always' => Yii::t('app', 'Activity Always'),
            'is_price_poa' => Yii::t('app', 'Is Price Poa'),
            'price' => Yii::t('app', 'Price'),
            'price_to' => Yii::t('app', 'Price To'),
            'num_of_rooms' => Yii::t('app', 'Num Of Rooms'),
            'floor' => Yii::t('app', 'Floor'),
            'floor_total' => Yii::t('app', 'Floor Total'),
            'square' => Yii::t('app', 'Square'),
            'land_square' => Yii::t('app', 'Land Square'),
            'window_to' => Yii::t('app', 'Window To'),
            'living_conditions' => Yii::t('app', 'Living Conditions'),
            'services' => Yii::t('app', 'Services'),
            'berths' => Yii::t('app', 'Berths'),
            'active' => Yii::t('app', 'Active'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'lon'),
            'rating' => Yii::t('app', 'Rating'),
            'date_up_search' => Yii::t('app', 'Date Up Search'),
            'is_special_offer' => Yii::t('app', 'Is Special Offer'),
            'is_free_to' => Yii::t('app', 'Is Free To'),
            'price_type' => Yii::t('app', 'Price Type'),
            'sort_order' => Yii::t('app', 'sort_order'),
            'owner_active' => Yii::t('app', 'Owner Active'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'description_near_en' => Yii::t('app', 'Description Near En'),
            'address_en' => Yii::t('app', 'Address En'),
            'title_en' => Yii::t('app', 'Title En'),
            'description_en' => Yii::t('app', 'Description En'),
            'exchange_to_en' => Yii::t('app', 'Exchange To En'),
            'note' => Yii::t('app', 'Note'),
            'phone' => Yii::t('app', 'Phone'),
            'vk_post_id' => Yii::t('app', 'Auto Vkpost ID'),
            'facebook_post_id' => Yii::t('app', 'Auto Fbpost ID'),
            'twitter_post_id' => Yii::t('app', 'Auto Twitter Post ID'),
            'count_img' => Yii::t('app', 'Count Img'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return ListingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListingQuery(get_called_class());
    }

    public function getImages()
    {
        return $this->hasMany(Image::class, ['id' => 'listing_id'])
            ->orderBy('is_default DESC, sort_order');
    }

    public function getImage()
    {
        return $this->hasOne(Image::class, ['listing_id' => 'id'])
            ->default();
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    public function getTitle()
    {
        return $this->title_en;
    }

    public function getTitleShort($limit = 20)
    {
        return StringHelper::truncate($this->title_en, $limit);
    }

    public function getExcerpt()
    {
        return StringHelper::truncate($this->description_en, 30);
    }

    public function getUrl()
    {
        return Url::toRoute([
            'listing/view',
            'id' => $this->id,
            'slug' => Inflector::slug($this->title_en),
        ]);
    }

    public function getPrintUrl()
    {
        return Url::toRoute([
            'listing/view',
            'id' => $this->id,
            'slug' => Inflector::slug($this->title_en),
            'print' => true
        ]);
    }

    public function isOwner()
    {
        return true;
    }

    public function getIsDeleted()
    {
        return false;
    }

    public function getEditUrl()
    {
        if (Yii::$app->user->can('backend_access')) {
            return Yii::$app->urlManager->createUrl(
                '/apartments/backend/main/update',
                ['id' => $this->id]
            );
        } elseif ($this->isOwner() && !$this->isDeleted) {
            return Url::to(['/user/listing/update', 'id' => $this->id]);
        }
    }

    public function getMetaTitle()
    {
        $title = $this->title_en;
        if (isset($this->city) && isset($this->city->name)) {
            $title .= ', ' . Yii::t('app', 'City') . ' ' . $this->city->name;
        }

        return $title;
    }

    public function getMetaDescription()
    {
        return StringHelper::truncate($this->description_en, 20);
    }


}
