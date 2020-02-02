<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property int $id
 * @property float $item_weight
 * @property float $price
 * @property int $user_address_id
 *
 * @property User $userAddress
 * @property UserOrder[] $userOrders
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_weight', 'price', 'user_address_id'], 'required'],
            [['item_weight', 'price'], 'number'],
            [['user_address_id'], 'integer'],
            [['user_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_address_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_weight' => 'Item Weight',
            'price' => 'Price',
            'user_address_id' => 'User Address ID',
        ];
    }

    /**
     * Gets query for [[UserAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddress()
    {
        return $this->hasOne(User::className(), ['id' => 'user_address_id']);
    }

    /**
     * Gets query for [[UserOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['transfer_id' => 'id']);
    }
}
