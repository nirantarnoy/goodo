<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'bomlistid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'qtyper') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'calculation') ?>

    <?php // echo $form->field($model, 'level') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
