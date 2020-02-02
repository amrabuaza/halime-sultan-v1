<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemPhoto */

$this->title = 'Add Item Photo';
$this->params['breadcrumbs'][] = ['label' => 'Item Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-photo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
