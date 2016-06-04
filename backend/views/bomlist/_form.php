<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\web\Session;
use yii\bootstrap\Modal;
use yii\web\UrlManager;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $model backend\models\Bomlist */
/* @var $form yii\widgets\ActiveForm */
$product = \backend\Models\Product::find()->all();
$sesproduct = [['recid' => $session['prodrecid'], 'prodcode' => $session['prodcode']]];
$prod = backend\Models\Product::find()->all();

function getprodcode($id){
    $modelcode = backend\Models\Product::find()->where(['recid'=>$id])->one();
    return $modelcode->prodcode;
}
function getprodname($id){
    $modelcode = backend\Models\Product::find()->where(['recid'=>$id])->one();
    return $modelcode->prodname;
}
function getprodunit($id){
    $modelcode = backend\Models\Product::find()->where(['recid'=>$id])->one();
    return $modelcode->unit->unitname;
}
function getprodtype($id){
    $modelcode = backend\Models\Product::find()->where(['recid'=>$id])->one();
    return $modelcode->prodtype ==0?'Parent':'Child';
}
?>

<div class="bomlist-form">

    <div class="ses-prodid" id="<?php echo isset($session['prodrecid']) ? $session['prodrecid'] : ''; ?>"></div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                BOM
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
            <div class="row">
                <div class="col-lg-3">

                    <?php //echo $form->field($model, 'bomname')->textInput(['maxlength' => true,'value'=>$session['prodcode'],'readonly'=>'readonly','class'=>'form-control'])  ?>    
                    <?=
                    $form->field($model, 'productid')->widget(Select2::className(), [
                        'data' => ArrayHelper::map($product, "recid", function($data) {
                                    return $data->fullname;
                                }),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select Product......','id'=>'prodid',],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        
                    ])
                    ?>    

                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'bomname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <?=
                    $form->field($model, 'fromdate')->widget(DatePicker::className(), [ 'pluginOptions' => [
                            'format' => 'dd-mm-yyyy',
                            'autoclose' => true,
                            'todayHighlight' => true
                ]])
                    ?>
                </div>
                <div class="col-lg-4">
                    <?=
                    $form->field($model, 'todate')->widget(DatePicker::className(), [ 'pluginOptions' => [
                            'format' => 'dd-mm-yyyy',
                            'autoclose' => true,
                            'todayHighlight' => true
                ]])
                    ?>
                </div>


                <div class="col-lg-2">

                    <?= $form->field($model, 'active')->checkbox() ?>
                </div>
                <div class="col-lg-2">

                    <?= $form->field($model, 'approve')->checkbox() ?>
                </div>

            </div>

            <?php //echo $form->field($model, 'createby')->textInput()  ?>

            <?php //echo $form->field($model, 'createdate')->textInput()  ?>
        </div>
    </div>
    
    <?php if(!$model->isNewRecord):?>
    <div class="box">
        <div class="box-header">

            <div class="pull-left">
                <ul class="header-menu" style="float: left;list-style: none;padding: 0;height: 20px;">
                    <li class="addline"><a href="#"><i class="fa fa-plus-square"></i> Add lines</a> </li>
                    <li class="removeline"><a href="#"><i class="fa fa-minus-square"></i> Remove line</a> </li>
                    <li class="showtree"><a href="#"><i class="fa fa-minus-square"></i> Tree structure</a> </li>
                </ul>
            </div>

            <!--            <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">
                            </ul>
            
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>-->
        </div>
        <div class="box-body">
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
                    <?php ///if (!$model->isNewRecord && count($modelline) > 0):  ?>
                    <?php if ($model->isNewRecord): ?>

                        <tr id="">
                            <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                <input id="xix" name="prodcode[]" list="dl" type="text" class="form-control prodcode" autocomplete="off" value="">
                                <datalist id="dl" >
                                    <?php foreach ($prod as $item): ?>
                                        <option value="<?= $item->prodcode ?>"/>
                                    <?php endforeach; ?>
                                </datalist>

                            </td>
                            <td style="text-align: left;" class="prodname2">
                                <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname[]" value="">
                            </td>
                            <td style="vertical-align: middle;" class="tdname">
                                <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="qty[]"  value="" autocomplete="off">
                            </td>

                            <td style="vertical-align: middle;">
                                <input type="text"  style="border: none;text-align: center;" class="form-control transunit" name="unit[]" value="" readonly="readonly">                         
                            </td>
                            <td style="vertical-align: middle;">
                                <input id="xix" list="dl2" type="text" class="form-control prodtype" value="" autocomplete="off" readonly="readonly">

                            </td>
                            <td style="vertical-align: middle;text-align: center;">
                                <input type="checkbox" name="iscal[]">
                            </td>
                            <td style="vertical-align: middle;text-align: center;">

                            </td>

                        </tr>


                    <?php elseif (!$model->isNewRecord):?>
                       <?php foreach ($modelline as $data):?>
                        <tr id="<?= $data->recid;?>">
                            <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                <input id="xix" name="prodcode[]" list="dl" type="text" class="form-control prodcode" autocomplete="off" value="<?= getprodcode($data->productid); ?>">
                                <datalist id="dl" >
                                    <?php foreach ($prod as $item): ?>
                                        <option value="<?= $item->prodcode ?>"/>
                                    <?php endforeach; ?>
                                </datalist>

                            </td>
                            <td style="text-align: left;" class="prodname2">
                                <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname[]" value="<?= getprodname($data->productid); ?>">
                            </td>
                            <td style="vertical-align: middle;" class="tdname">
                                <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="qty[]"  value="<?=$data->qtyper;?>" autocomplete="off">
                            </td>

                            <td style="vertical-align: middle;">
                                <input type="text"  style="border: none;text-align: center;" class="form-control transunit" name="unit[]" value="<?= getprodunit($data->productid); ?>" readonly="readonly">                         
                            </td>
                            <td style="vertical-align: middle;">
                                <input id="xix" list="dl2" type="text" class="form-control prodtype" value="<?= getprodtype($data->productid); ?>" autocomplete="off" readonly="readonly">

                            </td>
                            <td style="vertical-align: middle;text-align: center;">
                                <?php if($data->calculation == 0):?>
                                <input type="checkbox" name="iscal[]">
                                <?php else:?>
                                <input type="checkbox" checked="checked" name="iscal[]">
                                <?php endif;?>
                            </td>
                            <td style="vertical-align: middle;text-align: center;">

                            </td>

                        </tr>
                       <?php endforeach;?>
                        
                         <tr id="">
                            <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                <input id="xix" name="prodcode[]" list="dl" type="text" class="form-control prodcode" autocomplete="off" value="">
                                <datalist id="dl" >
                                    <?php foreach ($prod as $item): ?>
                                        <option value="<?= $item->prodcode ?>"/>
                                    <?php endforeach; ?>
                                </datalist>

                            </td>
                            <td style="text-align: left;" class="prodname2">
                                <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname[]" value="">
                            </td>
                            <td style="vertical-align: middle;" class="tdname">
                                <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="qty[]"  value="" autocomplete="off">
                            </td>

                            <td style="vertical-align: middle;">
                                <input type="text"  style="border: none;text-align: center;" class="form-control transunit" name="unit[]" value="" readonly="readonly">                         
                            </td>
                            <td style="vertical-align: middle;">
                                <input id="xix" list="dl2" type="text" class="form-control prodtype" value="" autocomplete="off" readonly="readonly">

                            </td>
                            <td style="vertical-align: middle;text-align: center;">
                                <input type="checkbox" name="iscal[]">
                            </td>
                            <td style="vertical-align: middle;text-align: center;">

                            </td>

                        </tr>
                        
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif;?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     
    <?php ActiveForm::end(); ?>

<?php
                    Modal::begin([
                        'header' => '<h4>BOM Structure</h4>',
                        'headerOptions' => ['style' => 'background-color: #FFB4B4;color: #fff'],
                        'id' => 'modal',
                        // 'data-backdrop'=>false,
                        'size' => 'modal-lg',
                        'options' => ['data-backdrop' => 'static',
                        ],
                       // 'footer' => '<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>',
                    ]);
                    echo "<div id='showmodal'></div>";
                    ?>

                    <?php Modal::end() ?> 
</div>

<?php
$this->registerJs(
        '   
            $(function(){
                var rowindex = -1;
                $("table tr").click(function(){
                  rowindex = $(this).index();
                });
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
                          var chkrow = 0;
                          var tr;
                          $("table tbody>tr").each(function(){
                             chkrow +=1;
                             tr = $(this);
                           //  alert(chkrow);
                          });
                          
                         if(chkrow == 1){
                             tr.find(".prodcode").val("");
                             tr.find(".prodname").val("");
                             tr.find(".transqty").val("");
                             tr.find(".transunit").val("");
                          
                         }else if(chkrow > 1){ 
                            $("table tbody>tr:eq("+ rowindex +")").remove();
                         }
                   
                     });
                     
                    $(".prodcode").change(function(){
                        var crow  = $(this).closest("tr");
                       // alert($(this).val());
                         var xurl = "' . \yii::$app->getUrlManager()->createUrl('bomlist/getdetail') . '";
                      
                       $.ajax({
                            type:"post",
                            dataType: "json",
                            url: xurl,
                            data:{id: $(this).val()},
                            success: function(data){
                                //alert(data[0]);
                               crow.find(".prodname").val(data[0]);
                               crow.find(".transqty").val(data[1]);
                               crow.find(".transunit").val(data[2]);
                               crow.find(".prodtype").val(data[3]);
                            }
                            ,
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });                       
                     });
                     $(".showtree").click(function(){
                       var xurl = "' . \yii::$app->getUrlManager()->createUrl('bomlist/createid') . '";
                       
                       $.ajax({
                          type: "post",
                          dataType: "html",
                          url: xurl,
                          async: false,
                          data:{prodid: $("#prodid").val()},
                          success: function(data){
                              
                          },
                          error: function(data){}
                       });
                          
                         showtree();
                      
                      
                     });
                     function showtree(){
                        var url = "' . \yii::$app->getUrlManager()->createUrl('bomlist/showtree') . '";
                        $("#modal").modal("show")
                               .find("#showmodal")
                               .load(url);
                     }
                     
                  // $("#modal").draggable({handle:".modal-header"});
            });'
);
?>