<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Colors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-color-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'color',
            [
                'attribute' => 'Item Name',
                'value' => function ($model, $key, $index, $column) {
                    $item_name = \backend\models\Item::findOne($model->item_id)->name;
                    return $item_name;
                },
            ],
            'item_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
