<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Approvelist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approvelist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vendid')->textInput() ?>

    <?= $form->field($model, 'prodid')->textInput() ?>

    <?= $form->field($model, 'fromdate')->textInput() ?>

    <?= $form->field($model, 'todate')->textInput() ?>

    <?= $form->field($model, 'createby')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
