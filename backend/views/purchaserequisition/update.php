<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Purchaserequisition */

$this->title = 'Update Purchaserequisition: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Purchaserequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchaserequisition-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
