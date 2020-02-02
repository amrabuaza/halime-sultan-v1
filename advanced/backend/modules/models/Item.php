<?php

namespace backend\modules\models;

use backend\models\ItemColor;
use backend\models\ItemFeadback;
use backend\models\ItemPhoto;
use backend\models\ItemSize;
use backend\models\OrderItems;
use backend\models\SubCategory;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property float|null $price_after_sale
 * @property float $weight
 * @property int $sub_category_id
 *
 * @property SubCategory $subCategory
 * @property ItemColor[] $itemColors
 * @property ItemFeadback[] $itemFeadbacks
 * @property ItemPhoto[] $itemPhotos
 * @property ItemSize[] $itemSizes
 * @property OrderItems[] $orderItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'weight', 'sub_category_id'], 'required'],
            [['price', 'price_after_sale', 'weight'], 'number'],
            [['sub_category_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'price_after_sale' => 'Price After Sale',
            'weight' => 'Weight',
            'sub_category_id' => 'Sub Category ID',
        ];
    }

    /**
     * Gets query for [[SubCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'sub_category_id']);
    }

    /**
     * Gets query for [[ItemColors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemColors()
    {
        return $this->hasMany(ItemColor::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[ItemFeadbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemFeadbacks()
    {
        return $this->hasMany(ItemFeadback::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[ItemPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemPhotos()
    {
        return $this->hasMany(ItemPhoto::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[ItemSizes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemSizes()
    {
        return $this->hasMany(ItemSize::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['item_id' => 'id']);
    }

    public function fields()
    {
        $fields = parent::fields();

        $fields['sizes'] = function ($model) {
            return $this->itemSizes;
        };

        $fields['colors'] = function ($model) {
            return $this->itemColors;
        };

        $fields['photos'] = function ($model) {
            return $this->itemPhotos;
        };

        return $fields;
    }


}
