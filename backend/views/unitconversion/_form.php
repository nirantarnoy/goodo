<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Unitconversion */
/* @var $form yii\widgets\ActiveForm */
$unit = backend\Models\Unit::find()->all();
$unit2 = backend\Models\Unit::find()->all();
?>

<div class="unitconversion-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Data</b> 
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
    <?= $form->field($model, 'prodid')->textInput() ?>

    <?= $form->field($model, 'fromunit')->textInput() ?>

    <?= $form->field($model, 'tounit')->textInput() ?>

    <?= $form->field($model, 'fromfactor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tofactor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
