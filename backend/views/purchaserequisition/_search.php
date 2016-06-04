<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaserequisitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchaserequisition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'recid') ?>

    <?php //echo $form->field($model, 'prno') ?>

    <?php //echo $form->field($model, 'prdate') ?>

    <?php //echo $form->field($model, 'requiredate') ?>

    <?php //echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'approveby') ?>

    <?php // echo $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'modifydate') ?>

    <div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
