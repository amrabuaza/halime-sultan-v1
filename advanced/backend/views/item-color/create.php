<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemColor */

$this->title = 'Add Item Color';
$this->params['breadcrumbs'][] = ['label' => 'Item Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-color-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
