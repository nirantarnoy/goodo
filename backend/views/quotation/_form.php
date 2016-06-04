<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'salequoteno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deliverydate')->textInput() ?>

    <?= $form->field($model, 'shipdate')->textInput() ?>

    <?= $form->field($model, 'customerid')->textInput() ?>

    <?= $form->field($model, 'currencyid')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'discountper')->textInput() ?>

    <?= $form->field($model, 'vat')->textInput() ?>

    <?= $form->field($model, 'discountamt')->textInput() ?>

    <?= $form->field($model, 'discountperamt')->textInput() ?>

    <?= $form->field($model, 'vatamt')->textInput() ?>

    <?= $form->field($model, 'totalamt')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'refer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totaltext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
