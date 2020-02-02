<?php

use backend\models\ItemColor;
use backend\models\ItemPhoto;
use backend\models\ItemShippingPrice;
use backend\models\ItemSize;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])?>
    </p>
    <p>
        <?php
        $itemSizeCount = ItemSize::find()->where(["item_id" => $model->id])->count();
        $itemColorCount = ItemColor::find()->where(["item_id" => $model->id])->count();
        $itemPhotoCount = ItemPhoto::find()->where(["item_id" => $model->id])->count();
        $itemShippingCount = ItemShippingPrice::find()->where(["item_id" => $model->id])->count();

        echo '<div class="row">';

        echo '<div class="col-sm-2">';
        if ($itemSizeCount == 0) {
            print Html::a('Add Item Sizes', ['add-size', 'id' => $model->id], ['class' => 'btn btn-sm btn-success']);
        } else {
            print Html::a('Update Item Sizes', ['update-size', 'id' => $model->id], ['class' => 'btn btn-sm btn-info']);
        }
        echo "</div>";

        echo '<div class="col-sm-2">';
        if ($itemColorCount == 0) {
            print Html::a('Add Item Colors', ['add-color', 'id' => $model->id], ['class' => 'btn btn-sm btn-success']);
        } else {
            print Html::a('Update Item Colors', ['update-color', 'id' => $model->id], ['class' => 'btn btn-sm btn-default']);
        }
        echo "</div>";

        echo '<div class="col-sm-2">';
        if ($itemPhotoCount == 0) {
            print Html::a('Add Item Photos', ['add-photo', 'id' => $model->id], ['class' => 'btn btn-sm btn-success']);
        } else {
            print Html::a('Update Item Photos', ['update-photo', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning']);
        }
        echo "</div>";

        echo '<div class="col-sm-2">';

        if ($itemShippingCount == 0) {
            $shippingAction = "Add Item Shipping";
            print Html::submitButton($shippingAction, ['value' => Url::to(['add-shipping?id=' . $model->id]), 'class' => 'mange-shipping btn btn-sm btn-success']);
        } else {
            $shippingAction = "Update Item Shipping";
            print Html::submitButton($shippingAction, ['value' => Url::to(['update-shipping?id=' . $model->id]), 'class' => 'mange-shipping btn btn-sm btn-primary']);
        }
        echo "</div>";

        echo '</div>';
        ?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4> '.$shippingAction .'</h4>',
        'id' => 'myModal',
        'size' => 'modal-sm',
    ]);

    echo "<div id='myModalContent'></div>";

    Modal::end();

    ?>

    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'price',
            'price_after_sale',
            'weight',
        ],
    ])?>

</div>
