<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <p>
        <?=Html::a('Add Item', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            [
                'attribute' => 'Sub Category Name',
                'value' => function ($model, $key, $index, $column) {
                    $catregory_name = \backend\models\SubCategory::findOne($model->sub_category_id)->name;
                    return $catregory_name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>

    <?php Pjax::end(); ?>

</div>
