<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'recid') ?>

    <?php // $form->field($model, 'prodname') ?>

    <?php // $form->field($model, 'prodename') ?>

    <?php // $form->field($model, 'detail') ?>

    <?php // $form->field($model, 'prodgroupid') ?>

    <?php // echo $form->field($model, 'prodcategoryid') ?>

    <?php // echo $form->field($model, 'planid') ?>

    <?php // echo $form->field($model, 'inventunit') ?>

    <?php // echo $form->field($model, 'purchaseunit') ?>

    <?php // echo $form->field($model, 'saleunit') ?>

    <?php // echo $form->field($model, 'bomunit') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'netweight') ?>

    <?php // echo $form->field($model, 'tareweight') ?>

    <?php // echo $form->field($model, 'grossweight') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'dept') ?>

    <?php // echo $form->field($model, 'density') ?>

    <?php // echo $form->field($model, 'minstock') ?>

    <?php // echo $form->field($model, 'maxstock') ?>

    <?php // echo $form->field($model, 'minorder') ?>

    <?php // echo $form->field($model, 'maxorder') ?>

    <?php // echo $form->field($model, 'multiple') ?>

    <?php // echo $form->field($model, 'prodtype') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'costdate') ?>

    <?php // echo $form->field($model, 'packing') ?>

    <?php // echo $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'modifydate') ?>
    <div class="input-group">
<!--         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
         <?= $form->field($model, 'globalSearch')->textInput(['placeholder'=>'Search','class'=>'form-control','aria-describedby'=>'basic-addon1'])->label(false) ?> 
    </div>
    
<!--    <div class="form-group">
        <?php //echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>
