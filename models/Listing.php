<?php
namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "listings".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $category_id
 * @property integer $country_id
 * @property integer $region_id
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
 * @property integer $deleted_at
 * @property integer $parent_id
 */
class Listing extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = -1;
    const STATUS_ACTIVE = 1;

    const TYPE_RENT = 1;
    const TYPE_SALE = 2;
    const TYPE_RENTING = 3;
    const TYPE_BUY = 4;
    const TYPE_CHANGE = 5;
    const TYPE_DEFAULT = 1;
    const TYPE_DISABLED = 13;

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
            [['type_id', 'category_id', 'country_id', 'region_id', 'city', 'city_id', 'view_count', 'activity_always', 'is_price_poa', 'price', 'price_to', 'num_of_rooms', 'floor', 'floor_total', 'window_to', 'living_conditions', 'services', 'active', 'rating', 'is_special_offer', 'price_type', 'sort_order', 'owner_active', 'owner_id', 'count_img', 'deleted_at', 'parent_id'], 'integer'],
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
            'parent_id' => Yii::t('app', 'Parent ID'),
            'type_id' => Yii::t('app', 'Type'),
            'category_id' => Yii::t('app', 'Category'),
            'country_id' => Yii::t('app', 'Country'),
            'region_id' => Yii::t('app', 'Region'),
            'city_id' => Yii::t('app', 'City'),
            'view_count' => Yii::t('app', 'Views'),
            'manual_updated_at' => Yii::t('app', 'Date Manual Updated'),
            'activity_ended_at' => Yii::t('app', 'Date End Activity'),
            'activity_always' => Yii::t('app', 'Activity Always'),
            'is_price_poa' => Yii::t('app', 'Price POA'),
            'price' => Yii::t('app', 'Price'),
            'price_to' => Yii::t('app', 'Price To'),
            'floor' => Yii::t('app', 'Floor'),
            'floor_count' => Yii::t('app', 'Number of Floors'),
            'room_count' => Yii::t('app', 'Number of Rooms'),
            'image_count' => Yii::t('app', 'Number of Images'),
            'square' => Yii::t('app', 'Square'),
            'land_square' => Yii::t('app', 'Land Square'),
            'window_to' => Yii::t('app', 'Window To'),
            'living_conditions' => Yii::t('app', 'Living Conditions'),
            'services' => Yii::t('app', 'Services'),
            'berths' => Yii::t('app', 'Berths'),
            'status' => Yii::t('app', 'Status'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
            'rating' => Yii::t('app', 'Rating'),
            'searched_at' => Yii::t('app', 'Date Up Search'),
            'is_special_offer' => Yii::t('app', 'Is Special Offer'),
            'is_free_to' => Yii::t('app', 'Is Free To'),
            'price_type' => Yii::t('app', 'Price Type'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'owner_active' => Yii::t('app', 'Owner Active'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'notes' => Yii::t('app', 'Notes'),
            'phone' => Yii::t('app', 'Phone'),
            'vk_post_id' => Yii::t('app', 'VK Post ID'),
            'facebook_post_id' => Yii::t('app', 'Facebook Post ID'),
            'twitter_post_id' => Yii::t('app', 'Twitter Post ID'),
            'deleted_at' => Yii::t('app', 'Deleted'),
            'updated_at' => Yii::t('app', 'Date Updated'),
            'created_at' => Yii::t('app', 'Date Created'),
            'title_en' => Yii::t('app', 'Title'),
            'near_by_en' => Yii::t('app', 'Near By'),
            'description_en' => Yii::t('app', 'Description'),
            'address_en' => Yii::t('app', 'Address'),
            'exchange_to_en' => Yii::t('app', 'Exchange'),
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
        return $this->hasMany(Image::class, ['listing_id' => 'id'])
            ->orderBy('is_default DESC, sort_order');
    }

    public function getImage()
    {
        return $this->hasOne(Image::class, ['listing_id' => 'id'])
            ->default();
    }

    public function getPanorama()
    {
        return null;
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTitle()
    {
        return $this->title_en;
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
            'print' => true,
        ]);
    }

    public function getEditUrl()
    {
        if (Yii::$app->user->can('admin_access')) {
            return Url::to(['/admin/listing/update', 'id' => $this->id]);
        }
        
        if ($this->owner && !$this->deleted) {
            return Url::to(['/account/listing/update', 'id' => $this->id]);
        }
    }

    public function getOwner()
    {
        return true;
    }

    public function getDeleted()
    {
        return isset($this->deleted_at);
    }

    public function getMetaTitle()
    {
        $title = $this->title_en;

        if (isset($this->city) && isset($this->city->name)) {
            $title .= ', ' . Yii::t('app', 'City') . ' ' . $this->city->name;
        }

        return $title;
    }

    public function getDescription()
    {
        return StringHelper::truncate($this->description_en, 20);
    }

    public function getType()
    {
        return $this->type_id;
    }

    public function getPrettyPrice()
    {
        return $this->price;
    }

    public function getDefaultPrice()
    {
        // if ($listing->canShowInView('price')) {
        if ($this->is_price_poa) {
            return Yii::t('app', 'is_price_poa');
        } else {
            return Yii::t('app', 'Price from') . ': ' . $this->getPrettyPrice();
        }
        // }
    }
}
