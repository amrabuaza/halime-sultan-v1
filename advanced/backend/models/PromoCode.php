<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "promo_code".
 *
 * @property int $id
 * @property string $code
 * @property string $status
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserOrder[] $userOrders
 */
class PromoCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'status', 'start_date', 'end_date', 'updated_at'], 'required'],
            [['status'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'status' => 'Status',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[UserOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['promo_code_id' => 'id']);
    }
}
