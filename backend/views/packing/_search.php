<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PackingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'recid') ?>

    <?php //echo $form->field($model, 'packcode') ?>

    <?php //echo $form->field($model, 'detail') ?>

    <?php //echo $form->field($model, 'factor') ?>

    <?php //echo $form->field($model, 'createdate') ?>

    <div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
