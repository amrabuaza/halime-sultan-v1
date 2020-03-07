<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PromoCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promo Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-code-index">

    <p>
        <?= Html::a('Add Promo Code', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'status',
            'start_date',
            'end_date',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
