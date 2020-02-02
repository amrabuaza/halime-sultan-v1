<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-category-index">

    <p>
        <?=Html::a('Create Sub Category', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            [
                'attribute' => 'Base Category Name',
                'value' => function ($model, $key, $index, $column) {
                    $category_name = \backend\models\Category::findOne($model->base_category_id)->name;
                    return $category_name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>


</div>
