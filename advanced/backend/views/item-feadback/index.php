<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemFeadbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Feadbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-feadback-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'feadback',
            [
                'attribute' => 'Item Name',
                'value' => function ($model, $key, $index, $column) {
                    $item_name = \backend\models\Item::findOne($model->item_id)->name;
                    return $item_name;
                },
            ],
            'order_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
