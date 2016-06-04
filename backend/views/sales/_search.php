<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'recid') ?>

    <?php // $form->field($model, 'saleno') ?>

    <?php // $form->field($model, 'deliverydate') ?>

    <?php // $form->field($model, 'shipdate') ?>

    <?php // $form->field($model, 'customerid') ?>

    <?php // echo $form->field($model, 'currencyid') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discountper') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'discountamt') ?>

    <?php // echo $form->field($model, 'discountperamt') ?>

    <?php // echo $form->field($model, 'vatamt') ?>

    <?php // echo $form->field($model, 'totalamt') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'refer') ?>

    <?php // echo $form->field($model, 'totaltext') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <!--    <div class="form-group">
        <?php //echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>-->

<div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
