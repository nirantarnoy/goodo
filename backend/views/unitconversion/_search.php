<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitconversionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitconversion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'recid') ?>

    <?php // echo $form->field($model, 'prodid') ?>

    <?php // echo $form->field($model, 'fromunit') ?>

    <?php // echo $form->field($model, 'tounit') ?>

    <?php // echo $form->field($model, 'fromfactor') ?>

    <?php // echo $form->field($model, 'tofactor') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

     <div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
