<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Calendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-form">

    <?php $form = ActiveForm::begin(); ?>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Create</a></li>
        <li role="presentation" class=""><a href="#advanced" aria-controls="advanced" role="tab" data-toggle="tab">Manage Calendar</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="basic">
            <div class="panel panel-body">
                <?= $form->field($model, 'calendarname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'startdate')->widget(DatePicker::className(), [ 'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose' => true,
                        'todayHighlight' => true
            ],'options'=>['style'=>'width: 50%']])
                ?>
                <?=
                $form->field($model, 'enddate')->widget(DatePicker::className(), [ 'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose' => true,
                        'todayHighlight' => true
            ],'options'=>['style'=>'width: 50%']])
                ?>

                <?php //echo $form->field($model, 'createdate')->textInput()  ?>

                
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="advanced">
            <div class="panel panel-body">
                <?php echo yii2fullcalendar::widget([
                    //'options'=>[],
                    'events'=>$eventsx,
                    //'ajaxEvents' => Url::to(['/timetrack/default/jsoncalendar'])
                ]);?>
            </div>
                
        </div>
    </div>
    <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
        <?php ActiveForm::end(); ?>

    </div>
