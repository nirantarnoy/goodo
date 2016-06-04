<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

<!--   <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
             <div style="width: 100%;height: 50px;background-color: #ffffff">
        <?php //Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        <div class="pull-left">
            <ul class="header-menu" style="float: left;list-style: none;padding: 0;height: 50px;">
            <li><a href="<?= yii\helpers\Url::to("index.php?r=product/create")?>"><i class="fa fa-paste"></i> Create</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=bomlist/create")?>"><i class="fa fa-sitemap"></i> BOM</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=unitconversion")?>"><i class="fa fa-anchor"></i> Unit Conversion</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=")?>"><i class="fa fa-star"></i> Approve vendor</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=product/bomlist")?>"><i class="fa fa-check"></i> Onhand</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=product/bomlist")?>"><i class="fa fa-tags"></i> Alias Name</a> </li>
            <li><a href="<?= yii\helpers\Url::to("index.php?r=product/bomlist")?>"><i class="fa fa-money"></i> Calculate Cost</a> </li>
        </ul>
        </div>
        <div class="pull-right input-group" style="padding: 1px 5px 1px 1px;">
<!--            <div class="input-group">-->
<!--              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
       <!--         <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">-->
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<!--            </div>-->
               
        </div>
        
    </div>
    <br />
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
  //          [
       //     'class' => 'yii\grid\CheckboxColumn',
      //                          'checkboxOptions' => function($model) {
      //                              return ['value' => \yii\helpers\ArrayHelper::getValue($model, 'recid'),
      //                                  'checked' => false,
//                                        'onClick' => ''
//                                        . 'if(this.checked){'
//                                        . 'this.parentElement.parentElement.style.backgroundColor="#CCFFCC";'
//                                        . '}'
//                                        . 'else{'
//                                        . 'this.parentElement.parentElement.style.backgroundColor="white";'
//                                        . '}'
  //                                  ];
  //                              },
  //          ],
            ['class' => 'yii\grid\SerialColumn'],

            //'recid',
            'prodcode',
            'prodname',
            'prodename',
           // 'detail',
            //'prodgroupid',
            [
              'attribute'=>'prodgroupid',
                'value'=>function($model){
                    return $model->group->groupname;
                }
            ],
             //'prodcategoryid',
                     [
              'attribute'=>'prodcategoryid',
                'value'=>function($model){
                    return $model->category->categoryname;
                }
            ],
            // 'planid',
            // 'inventunit',
                       [
              'attribute'=>'inventunit',
                'value'=>function($model){
                    return $model->unit->unitname;
                }
            ],
            // 'purchaseunit',
            // 'saleunit',
            // 'bomunit',
            // 'isactive',
            // 'photo',
            // 'netweight',
            // 'tareweight',
            // 'grossweight',
            // 'height',
            // 'width',
            // 'dept',
            // 'density',
            // 'minstock',
            // 'maxstock',
            // 'minorder',
            // 'maxorder',
            // 'multiple',
            // 'prodtype',
                    [
                        'attribute'=>'prodtype',
                        'format'=>'raw',
                        'contentOptions' => ['style' => 'text-align: center'],
                        'value'=>function($model){
                            return $model->prodtype ==0?'<i class="fa fa-sitemap" style="color:"></i>':'<i class="fa fa-folder-o" style="color:"></i>';
                    
                        }
                    ],
            // 'cost',,
            // 'costdate',
            // 'packing',
            // 'createby',
            // 'createdate',
            // 'modifydate',

           // ['class' => 'yii\grid\ActionColumn'],
                            [

                                        'header' => '',
                                        'headerOptions' => ['style' => 'width: 160px;text-align:center;', 'class' => 'activity-view-link',],
                                        'class' => 'yii\grid\ActionColumn',
                                        'contentOptions' => ['style' => 'text-align: right'],
                                        'buttons' => [
                                            'view' => function($url, $data, $index) {
                                                $options = [
                                                    'title' => Yii::t('yii', 'View'),
                                                    'aria-label' => Yii::t('yii', 'View'),
                                                    'data-pjax' => '0',
                                                ];
                                                return Html::a('<span class="fa fa-eye btn btn-default"></span>', '#', 
                                                        ['class'=>'btn_showjob',
                                                         'data-pjax' => '0',
                                                         'data-key'=>$data->recid,
                                                         'data-id'=>'index.php?r=jobpreview/showjob',
                                                         ]
                                                        );
                                            },
                                                    'update' => function($url, $data, $index) {
                                                $options = array_merge([
                                                    'title' => Yii::t('yii', 'Update'),
                                                    'aria-label' => Yii::t('yii', 'Update'),
                                                    'data-pjax' => '0',
                                                    'id' => 'modaledit',
                                                    'visible' => false,
                                                ]);
                                                return Html::a('<span class="fa fa-pencil btn btn-default"></span>', $url, [
                                                            'id' => 'activity-view-link',
                                                            //'data-toggle' => 'modal',
                                                            // 'data-target' => '#modal',
                                                            'data-id' => $index,
                                                            'data-pjax' => '0'
                                                        ]);
                                            },
                                                    'delete' => function($url, $data, $index) {
                                                $options = array_merge([
                                                    'title' => Yii::t('yii', 'Delete'),
                                                    'aria-label' => Yii::t('yii', 'Delete'),
                                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                    'data-method' => 'post',
                                                    'data-pjax' => '0',
                                                ]);
                                                return Html::a('<span class="fa fa-trash btn btn-default"></span>', $url, $options);
                                            }
                                                ]
                                            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
   
</div>
<?php
        Modal::begin([
            'header' => '',
            'id' => 'modal',
            // 'data-backdrop'=>false,
            'size' => 'modal-lg',
            'headerOptions'=>[],
            'options' => ['data-backdrop' => 'static',
            ],
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>',
        ]);
        echo "<div id='showmodal'></div>";
    
?>
<?php Modal::end();?>     

<?php $this->registerJs(
        ' 
            $(function(){
                // create recid
                $("table tbody>tr").each(function(){
                    $(this).click(function(){
                        var prodcode = $(this).closest("tr").find("td:nth-child(2)").text();
                        if(prodcode ==""){return;}
                        var xurl = "' . \yii::$app->getUrlManager()->createUrl('product/createid') . '";
                        var loadurl = "' . \yii::$app->getUrlManager()->createUrl('bomlist/create') . '";
                            $.ajax({
                                 type:"post",
                                 dataType: "html",
                                 url: xurl,
                                 data:{id: prodcode},
                                 success: function(data){
                                  // alert(data);
                                 }
                                 ,
                                 error:function(data){
                                     alert("KK");
                                 }
                             });
                             
                             $("#modal").modal("show").find("#showmodal").load(loadurl);
                    });
                });
            });
        '
);?>