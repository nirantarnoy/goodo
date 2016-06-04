<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packing-index">

    <div class="panel panel-default">
        <div class="panel-body">
            <div style="width: 100%;height: 50px;background-color: #ffffff">
                <?php //Html::a('Create Product', ['create'], ['class' => 'btn btn-success'])  ?>
                <div class="pull-left">
                    <ul class="header-menu" style="float: left;list-style: none;padding: 0;height: 50px;">
                        <li><a href="<?= yii\helpers\Url::to("index.php?r=packing/create") ?>"><i class="fa fa-paste"></i> Create</a> </li>
                    </ul>
                </div>
                <div class="pull-right input-group" style="padding: 1px 5px 1px 1px;">
                    <!--            <div class="input-group">-->
                    <!--              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>-->
                           <!--         <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">-->
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    <!--            </div>-->

                </div>

            </div>
            <br />
            <?php Pjax::begin(); ?>    <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //  'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //  'recid',
                    'packcode',
                    'detail',
                    'factor',
                    'createdate',
                  //  ['class' => 'yii\grid\ActionColumn'],
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
            ]);
            ?>
            <?php Pjax::end(); ?></div>
    </div>
</div>


