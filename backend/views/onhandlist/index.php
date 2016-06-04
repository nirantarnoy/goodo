<?php
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->title = "Inventory Onhand";
?>

<div class="panel panel-default">
        <div class="panel-body">
            <div style="width: 100%;height: 50px;background-color: #ffffff">
                <?php //Html::a('Create Product', ['create'], ['class' => 'btn btn-success'])  ?>
                <div class="pull-left">
                    <ul class="header-menu" style="float: left;list-style: none;padding: 0;height: 50px;">
                        <li><a href="<?= yii\helpers\Url::to("index.php?r=calendar/create") ?>"><i class="fa fa-paste"></i> Create</a> </li>
                        <li><a href="#" id="btngenday"><i class="fa fa-calendar-o"></i> Working Day</a> </li>
                    </ul>
                </div>
                <div class="pull-right input-group" style="padding: 1px 5px 1px 1px;">
                    <!--            <div class="input-group">-->
                    <!--              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
                           <!--         <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">-->
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                    <!--            </div>-->

                </div>

            </div>
            <br />
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'recid',
            'prodcode',
            'prodname',
           // 'realqty',
          //  'reserv',
            'qty',
            'minstock',
 //           'prodename',
//           // 'detail',
//            //'prodgroupid',
//            [
//              'attribute'=>'prodgroupid',
//                'value'=>function($model){
//                    return $model->group->groupname;
//                }
//            ],
//             //'prodcategoryid',
//                     [
//              'attribute'=>'prodcategoryid',
//                'value'=>function($model){
//                    return $model->category->categoryname;
//                }
//            ],
//            // 'planid',
//            // 'inventunit',
//                       [
//              'attribute'=>'inventunit',
//                'value'=>function($model){
//                    return $model->unit->unitname;
//                }
//            ],
//            // 'purchaseunit',
//            // 'saleunit',
//            // 'bomunit',
//            // 'isactive',
//            // 'photo',
//            // 'netweight',
//            // 'tareweight',
//            // 'grossweight',
//            // 'height',
//            // 'width',
//            // 'dept',
//            // 'density',
//            // 'minstock',
//            // 'maxstock',
//            // 'minorder',
//            // 'maxorder',
//            // 'multiple',
//            // 'prodtype',
//                    [
//                        'attribute'=>'prodtype',
//                        'value'=>function($model){
//                            return $model->prodtype ==0?"Parent":"Child";
//                        }
//                    ],
//            // 'cost',,
//            // 'costdate',
//            // 'packing',
//            // 'createby',
//            // 'createdate',
//            // 'modifydate',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
</div>


<?php
        Modal::begin([
            'header' => '<h3>Ohnand Details</h3>',
            'id' => 'modal',
            // 'data-backdrop'=>false,
            'size' => 'modal-lg',
            'headerOptions'=>[],
            'options' => ['data-backdrop' => 'static',
            ],
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>',
        ]);
        echo "<div id='showmodal'></div>";
    
?>
<?php Modal::end();?>   
<?php $this->registerJs(
        ' 
            $(function(){
                $("table tbody>tr").each(function(){
                    var onhand = $(this).find("td:nth-child(4)").text().trim();
                    var min = $(this).find("td:nth-child(5)").text().trim();
                    if(parseInt(onhand) < parseInt(min)){
                        $(this).find("td:nth-child(4)").css("background-color","#F4A460");
                    }
                    $(this).dblclick(function(){
                   
                         var prodid = $(this).find("td:nth-child(2)").text().trim();
                          var xurl = "' . \yii::$app->getUrlManager()->createUrl('productonhand/onhandline') . '";
                          $("#modal").modal("show")
                          .find("#showmodal")
                          .load(xurl+"&id="+ prodid);
                    });
                   
                });
            });
        ' 
);?>