<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $region
 * @property string $street_name
 * @property string $building_number_or_name
 * @property int $floor_number
 * @property int $apartment_number
 * @property int $user_id
 *
 * @property User $user
 * @property UserOrder[] $userOrders
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'city', 'region', 'street_name', 'building_number_or_name', 'floor_number', 'apartment_number', 'user_id'], 'required'],
            [['floor_number', 'apartment_number', 'user_id'], 'integer'],
            [['country', 'city', 'region', 'street_name', 'building_number_or_name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'city' => 'City',
            'region' => 'Region',
            'street_name' => 'Street Name',
            'building_number_or_name' => 'Building Number Or Name',
            'floor_number' => 'Floor Number',
            'apartment_number' => 'Apartment Number',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['user_address_id' => 'id']);
    }
}
