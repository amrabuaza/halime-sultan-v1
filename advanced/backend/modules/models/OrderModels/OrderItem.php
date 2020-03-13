<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $item_id
 * @property int $item_color_id
 * @property int $item_size_id
 * @property int $quantity
 * @property float $total
 * @property int $order_id
 *
 * @property Item $item
 * @property ItemColor $itemColor
 * @property ItemSize $itemSize
 * @property UserOrder $order
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'item_color_id', 'item_size_id', 'quantity', 'total', 'order_id'], 'required'],
            [['item_id', 'item_color_id', 'item_size_id', 'quantity', 'order_id'], 'integer'],
            [['total'], 'number'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['item_color_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemColor::className(), 'targetAttribute' => ['item_color_id' => 'id']],
            [['item_size_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemSize::className(), 'targetAttribute' => ['item_size_id' => 'id']],
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
            'item_id' => 'Item ID',
            'item_color_id' => 'Item Color ID',
            'item_size_id' => 'Item Size ID',
            'quantity' => 'Quantity',
            'total' => 'Total',
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
     * Gets query for [[ItemColor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemColor()
    {
        return $this->hasOne(ItemColor::className(), ['id' => 'item_color_id']);
    }

    /**
     * Gets query for [[ItemSize]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemSize()
    {
        return $this->hasOne(ItemSize::className(), ['id' => 'item_size_id']);
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
