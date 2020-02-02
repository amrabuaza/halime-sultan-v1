<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemSize */

$this->title = 'Add Item Size';
$this->params['breadcrumbs'][] = ['label' => 'Item Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-size-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
