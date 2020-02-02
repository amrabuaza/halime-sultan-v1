<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item_shipping_price".
 *
 * @property int $id
 * @property float $price
 * @property int $item_id
 *
 * @property Item $item
 */
class ItemShippingPrice extends \yii\db\ActiveRecord
{
    public $item_weight;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_shipping_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price'], 'number'],
            [['item_id'], 'integer'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'item_id' => 'Item ID',
            'item_weight' => 'Item Weight',
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
}
