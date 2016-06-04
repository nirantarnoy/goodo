<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'recid') ?>

    <?php //echo $form->field($model, 'customercode') ?>

    <?php //echo $form->field($model, 'customername') ?>

    <?php //echo $form->field($model, 'detail') ?>

    <?php //echo $form->field($model, 'customergroupid') ?>

    <?php // echo $form->field($model, 'currencyid') ?>

    <?php // echo $form->field($model, 'taxid') ?>

    <?php // echo $form->field($model, 'payment') ?>

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
