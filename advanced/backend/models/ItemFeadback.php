<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item_feadback".
 *
 * @property int $id
 * @property string $feadback
 * @property int $item_id
 * @property int $order_id
 *
 * @property Item $item
 * @property UserOrder $order
 */
class ItemFeadback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_feadback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feadback', 'item_id', 'order_id'], 'required'],
            [['item_id', 'order_id'], 'integer'],
            [['feadback'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feadback' => 'Feadback',
            'item_id' => 'Item ID',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(UserOrder::className(), ['id' => 'order_id']);
    }
}
