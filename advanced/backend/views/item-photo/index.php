<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemPhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-photo-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'Item Name',
                'value' => function ($model, $key, $index, $column) {
                    $item_name = \backend\models\Item::findOne($model->item_id)->name;
                    return $item_name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
