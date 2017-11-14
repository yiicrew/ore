<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartment".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $obj_type_id
 * @property integer $loc_country
 * @property integer $loc_region
 * @property integer $loc_city
 * @property integer $city_id
 * @property integer $visits
 * @property string $date_updated
 * @property string $date_created
 * @property string $date_manual_updated
 * @property string $date_end_activity
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
 * @property string $lng
 * @property integer $rating
 * @property string $date_up_search
 * @property integer $is_special_offer
 * @property string $is_free_to
 * @property integer $price_type
 * @property integer $sorter
 * @property integer $owner_active
 * @property integer $owner_id
 * @property string $description_near_en
 * @property string $address_en
 * @property string $title_en
 * @property string $description_en
 * @property string $exchange_to_en
 * @property string $note
 * @property string $phone
 * @property string $autoVKPostId
 * @property string $autoFBPostId
 * @property string $autoTwitterPostId
 * @property integer $count_img
 * @property integer $deleted
 * @property integer $parent_id
 */
class Apartment extends \yii\db\ActiveRecord
{

    const STATUS_INACTIVE = -1;
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apartment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'obj_type_id', 'loc_country', 'loc_region', 'loc_city', 'city_id', 'visits', 'activity_always', 'is_price_poa', 'price', 'price_to', 'num_of_rooms', 'floor', 'floor_total', 'window_to', 'living_conditions', 'services', 'active', 'rating', 'is_special_offer', 'price_type', 'sorter', 'owner_active', 'owner_id', 'count_img', 'deleted', 'parent_id'], 'integer'],
            [['date_updated', 'date_created', 'date_manual_updated', 'date_end_activity', 'date_up_search', 'is_free_to'], 'safe'],
            [['square', 'land_square'], 'number'],
            [['description_near_en', 'title_en', 'description_en', 'exchange_to_en', 'note'], 'string'],
            [['berths', 'address_en'], 'string', 'max' => 255],
            [['lat', 'lng'], 'string', 'max' => 25],
            [['phone'], 'string', 'max' => 20],
            [['autoVKPostId', 'autoFBPostId', 'autoTwitterPostId'], 'string', 'max' => 50],
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
            'obj_type_id' => Yii::t('app', 'Obj Type ID'),
            'loc_country' => Yii::t('app', 'Loc Country'),
            'loc_region' => Yii::t('app', 'Loc Region'),
            'loc_city' => Yii::t('app', 'Loc City'),
            'city_id' => Yii::t('app', 'City ID'),
            'visits' => Yii::t('app', 'Visits'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_manual_updated' => Yii::t('app', 'Date Manual Updated'),
            'date_end_activity' => Yii::t('app', 'Date End Activity'),
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
            'lng' => Yii::t('app', 'Lng'),
            'rating' => Yii::t('app', 'Rating'),
            'date_up_search' => Yii::t('app', 'Date Up Search'),
            'is_special_offer' => Yii::t('app', 'Is Special Offer'),
            'is_free_to' => Yii::t('app', 'Is Free To'),
            'price_type' => Yii::t('app', 'Price Type'),
            'sorter' => Yii::t('app', 'Sorter'),
            'owner_active' => Yii::t('app', 'Owner Active'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'description_near_en' => Yii::t('app', 'Description Near En'),
            'address_en' => Yii::t('app', 'Address En'),
            'title_en' => Yii::t('app', 'Title En'),
            'description_en' => Yii::t('app', 'Description En'),
            'exchange_to_en' => Yii::t('app', 'Exchange To En'),
            'note' => Yii::t('app', 'Note'),
            'phone' => Yii::t('app', 'Phone'),
            'autoVKPostId' => Yii::t('app', 'Auto Vkpost ID'),
            'autoFBPostId' => Yii::t('app', 'Auto Fbpost ID'),
            'autoTwitterPostId' => Yii::t('app', 'Auto Twitter Post ID'),
            'count_img' => Yii::t('app', 'Count Img'),
            'deleted' => Yii::t('app', 'Deleted'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return ApartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApartmentQuery(get_called_class());
    }
}
