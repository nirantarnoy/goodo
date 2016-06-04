<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'recid') ?>

    <?php //echo $form->field($model, 'productid') ?>

    <?php //echo $form->field($model, 'vendorid') ?>

    <?php //echo $form->field($model, 'ariasname') ?>

    <?php //echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'createdate') ?>
<div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
