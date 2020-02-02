<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $transaction_number
 * @property int $user_id
 * @property float $cost
 * @property string $status
 * @property string $card_token
 *
 * @property User $user
 * @property UserOrder[] $userOrders
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_number', 'user_id', 'cost', 'status', 'card_token'], 'required'],
            [['transaction_number', 'user_id'], 'integer'],
            [['cost'], 'number'],
            [['status'], 'string'],
            [['card_token'], 'string', 'max' => 255],
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
            'transaction_number' => 'Transaction Number',
            'user_id' => 'User ID',
            'cost' => 'Cost',
            'status' => 'Status',
            'card_token' => 'Card Token',
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
        return $this->hasMany(UserOrder::className(), ['transaction_id' => 'id']);
    }
}
