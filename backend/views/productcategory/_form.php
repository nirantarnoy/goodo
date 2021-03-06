<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Productcategory */
/* @var $form yii\widgets\ActiveForm */
$cat = backend\Models\Productcategory::find()->all();
?>

<div class="productcategory-form">
    <?php $form = ActiveForm::begin()?>
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
            
    <?= $form->field($model, 'categoryname')->textInput(['style' => 'width: 50%']) ?>

    <?= $form->field($model, 'detail')->textarea(['row' => 4])  ?>

    <?php echo $form->field($model, 'parentid')->widget(Select2::className(),[
        'data'=>ArrayHelper::map($cat, 'recid', 'categoryname'),
        'options'=>[
            'placeholder'=>'Select....',
        ],
        'pluginOptions'=>[
            'allowClear' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

     </div>
 </div>
  
    <?php ActiveForm::end(); ?>

</div>
