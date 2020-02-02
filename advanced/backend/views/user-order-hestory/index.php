<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserOrderHestorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Order Hestories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-order-hestory-index">
    <br/>
    <br/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'total',
            'user_id',
            'user_address_id',
            //'promo_code_id',
            //'transaction_id',
            //'transfer_id',
            //'user_order_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
