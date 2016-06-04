<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bom */
/* @var $form yii\widgets\ActiveForm */
$prod = backend\Models\Product::find()->all();
?>

<div class="bom-form">

    <?php // $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'bomlistid')->textInput() ?>

     <?php //echo $form->field($model, 'productid')->textInput() ?>

     <?php //echo $form->field($model, 'qtyper')->textInput(['maxlength' => true]) ?>

     <?php //echo $form->field($model, 'type')->textInput() ?>

     <?php //echo $form->field($model, 'calculation')->textInput() ?>

     <?php //echo $form->field($model, 'level')->textInput() ?>

    <div class="form-group">
        <?php //echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php // ActiveForm::end(); ?>
    
    <div class="box" id="pidetail">
            <div class="box-header">
                <div class="box-title">
                    <!--                <b style="color: #979797">Detail</b> -->
                    Total
                </div>
                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    </ul>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row pull-left" style="margin-bottom: 15px;">

                    <div class="col-lg-12">
                        <div class="btn btn-success saveline"><i class="fa fa-save"></i> Save line</div>
                        <div class="btn btn-primary postline"><i class="fa fa-upload"></i> Post</div>

                    </div>

                </div>
                <div class="row pull-right" style="margin-bottom: 15px;">

                    <div class="col-lg-12">
                        <div class="btn btn-default addline"><i class="fa fa-plus-square"></i></div>
                        <div class="btn btn-warning removeline"><i class="fa fa-minus-square"></i></div>

                    </div>

                </div>

                <table class="table table-striped table-bordered table-hover" style="margin-top: 10px" data-resizable-columns-id="demo-table">
                    <thead>
                        <tr>
                            <th width="200px" style="text-align: left">ITEMID</th>
                            <th width="" style="text-align: left" data-resizable-column-id="NAME">NAME</th>
                            <th width="100px" style="text-align: right">QTY</th>
                            <th width="100px" style="text-align: center">UNIT</th>
                            <th width="100px" style="text-align: right">TYPE</th>
                            <th width="50px" style="text-align: center;">CAL</th>
                            <th width="50px" style="text-align: center;">LEVEL</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php ///if (!$model->isNewRecord && count($modelline) > 0): ?>
                       <?php if (1> 0): ?>
                           
                                <tr id="">
                                    <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                        <input id="xix" list="dl" type="text" class="form-control prodcode" autocomplete="off" value="">
                                        <datalist id="dl">
                                            <?php foreach ($prod as $item): ?>
                                                <option value="<?= $item->prodcode ?>"/>
                                            <?php endforeach; ?>
                                        </datalist>

                                    </td>
                                    <td style="text-align: left;" class="prodname2">
                                        <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="">
                                    </td>
                                    <td style="vertical-align: middle;" class="tdname">
                                        <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="transqty"  value="" autocomplete="off">
                                    </td>

                                    <td style="vertical-align: middle;">
                                        <input type="text"  style="border: none;text-align: center;" class="form-control transunit" name="transunit" value="">                         
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <input id="xix" list="dl2" type="text" class="form-control wh" value="" autocomplete="off">
                                        <datalist id="dl2">
                                           
                                        </datalist>
                                                         
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <input type="checkbox">
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                       
                                    </td>

                                </tr>
                          

                        <?php elseif (!$model->isNewRecord): ?>

                            <tr id="1">
                                <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                    <input id="xix" list="dl" type="text" class="form-control prodcode" autocomplete="off">
                                    <datalist id="dl">
                                        <?php foreach ($prod as $item): ?>
                                            <option value="<?= $item->prodcode ?>"/>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?php ?>
                                </td>
                                <td style="text-align: left;" class="prodname2">
                                    <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="">
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                    <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="transqty" autocomplete="off" value="">
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" class="form-control transunit" style="border: none;width: 100%;text-align: right;" name="transunit"  value="">
                                </td>

                                <td style="vertical-align: middle;">
                                    <input id="xix" list="dl2" type="text" class="form-control wh" autocomplete="off">
                                    <datalist id="dl2">
                                        <?php foreach ($wh as $item): ?>
                                            <option value="<?= $item->warehousename ?>"/>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?php
                                    ?>                       
                                </td>
                                <td style="vertical-align: middle;">
                                    <select class="form-control loc">

                                    </select>
                                </td>
                                <td style="vertical-align: middle;">
                                    <select class="form-control lot">

                                    </select>
                                </td>

                            </tr>

                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
<?php
    $this->registerJs(
            '   
            $(function(){
                $(".addline").click(function(){
                         var rowid = 0;
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".transqty").val("0");
                                $(this).find(".transunit").val("");
                                $(this).find(".wh").val("");
                                $(this).find(".loc").val("");
                                $(this).find(".lot").val("");
                              
                           }); 

                     });
                       $(".removeline").click(function(){
                       
                          var chkrow =0;
                          var tr;
                          $("table tbody>tr").each(function(){
                             chkrow +=1;
                             tr = $(this);
                          });
                         if(chkrow ==1){
                             tr.find(".prodcode").val("");
                             tr.find(".prodname").val("");
                             tr.find(".saleqty").val("");
                             tr.find(".saleunit").val("");
                             tr.find(".wh").val("");
                             tr.find(".loc").val("");
                          
                         }else{ 
                            $("table tbody>tr:eq("+ rowindex +")").remove();
                         }
                     
                         
                     });
            });'
    );?>
