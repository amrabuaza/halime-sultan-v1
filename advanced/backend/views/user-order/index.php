<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-order-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'total',
            [
                'attribute' => 'Username',
                'value' => function ($model, $key, $index, $column) {
                    $username = \backend\models\User::findOne($model->user_id)->name;
                    return $username;
                },
            ],
            //'user_address_id',
            //'promo_code_id',
            //'transaction_id',
            //'transfer_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
