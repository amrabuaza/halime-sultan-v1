<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <br/>
    <br/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'transaction_number',
            [
                'attribute' => 'Username',
                'value' => function ($model, $key, $index, $column) {
                    $username = \backend\models\User::findOne($model->user_id)->name;
                    return $username;
                },
            ],
            'cost',
            'status',
            //'card_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
