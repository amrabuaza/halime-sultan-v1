<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_order".
 *
 * @property int $id
 * @property string $status
 * @property float $total
 * @property int $user_id
 * @property int $user_address_id
 * @property int $promo_code_id
 * @property int $transaction_id
 * @property int $transfer_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ItemFeadback[] $itemFeadbacks
 * @property OrderItems[] $orderItems
 * @property PromoCode $promoCode
 * @property Transaction $transaction
 * @property Transfer $transfer
 * @property User $user
 * @property UserAddress $userAddress
 * @property UserOrderHestory[] $userOrderHestories
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'total', 'user_id', 'user_address_id', 'promo_code_id', 'transaction_id', 'transfer_id'], 'required'],
            [['status'], 'string'],
            [['total'], 'number'],
            [['user_id', 'user_address_id', 'promo_code_id', 'transaction_id', 'transfer_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['promo_code_id'], 'exist', 'skipOnError' => true, 'targetClass' => PromoCode::className(), 'targetAttribute' => ['promo_code_id' => 'id']],
            [['transaction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transaction::className(), 'targetAttribute' => ['transaction_id' => 'id']],
            [['transfer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transfer::className(), 'targetAttribute' => ['transfer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAddress::className(), 'targetAttribute' => ['user_address_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'total' => 'Total',
            'user_id' => 'User ID',
            'user_address_id' => 'User Address ID',
            'promo_code_id' => 'Promo Code ID',
            'transaction_id' => 'Transaction ID',
            'transfer_id' => 'Transfer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ItemFeadbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemFeadbacks()
    {
        return $this->hasMany(ItemFeadback::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[PromoCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromoCode()
    {
        return $this->hasOne(PromoCode::className(), ['id' => 'promo_code_id']);
    }

    /**
     * Gets query for [[Transaction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasOne(Transaction::className(), ['id' => 'transaction_id']);
    }

    /**
     * Gets query for [[Transfer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfer()
    {
        return $this->hasOne(Transfer::className(), ['id' => 'transfer_id']);
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
     * Gets query for [[UserAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddress()
    {
        return $this->hasOne(UserAddress::className(), ['id' => 'user_address_id']);
    }

    /**
     * Gets query for [[UserOrderHestories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrderHestories()
    {
        return $this->hasMany(UserOrderHestory::className(), ['user_order_id' => 'id']);
    }
}
