<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Purchaserequisition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchaserequisition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prdate')->textInput() ?>

    <?= $form->field($model, 'requiredate')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'approveby')->textInput() ?>

    <?= $form->field($model, 'createby')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'modifydate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
