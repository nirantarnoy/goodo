<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Maseter Data</b> 
            </div>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($model, 'purchno')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'purchname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'vendorid')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($model, 'purchdate')->textInput() ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'requiredate')->textInput() ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'discount')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($model, 'status')->textInput() ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'createdate')->textInput() ?>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
</div>










<?php //echo $form->field($model, 'discount')->textInput() ?>

<?php //echo $form->field($model, 'discountpercent')->textInput() ?>

<?php //echo $form->field($model, 'vat')->textInput() ?>

<?php //echo $form->field($model, 'discountamt')->textInput() ?>

<?php //echo $form->field($model, 'discountperamt')->textInput() ?>

<?php //echo $form->field($model, 'vatamt')->textInput() ?>

<?php //echo $form->field($model, 'totalamt')->textInput() ?>



<?php //echo $form->field($model, 'createby')->textInput() ?>



<?php //echo $form->field($model, 'modifydate')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<div class="box">
    <div class="box-header">
        <div class="box-title">
            <b style="color: #979797">Detail Data</b> 
        </div>
        <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
            </ul>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
    </div>
    <div class="box-body"></div>
</div>



<?php ActiveForm::end(); ?>

</div>
