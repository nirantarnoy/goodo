<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Purchaserequisition */

$this->title = 'Create Purchaserequisition';
$this->params['breadcrumbs'][] = ['label' => 'Purchaserequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchaserequisition-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
