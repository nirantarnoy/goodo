<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseTableSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-table-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'recid') ?>

    <?php //echo $form->field($model, 'purchno') ?>

    <?php //echo $form->field($model, 'purchname') ?>

    <?php //echo $form->field($model, 'vendorid') ?>

    <?php //echo $form->field($model, 'purchdate') ?>

    <?php // echo $form->field($model, 'requiredate') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discountpercent') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'discountamt') ?>

    <?php // echo $form->field($model, 'discountperamt') ?>

    <?php // echo $form->field($model, 'vatamt') ?>

    <?php // echo $form->field($model, 'totalamt') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'modifydate') ?>

    <div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
