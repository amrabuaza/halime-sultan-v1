<?php

use backend\models\Item;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemPhoto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Item Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <div class="item-photo-view">

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

        <?=DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                [
                    'label' => 'Item Name',
                    'value' => Item::findOne($model->item_id)->name
                ],
            ],
        ])?>

        <?=Html::img('../uploads/' . $model->name, ['class' => 'view-item-photo-img'])?>


    </div>
</div>
