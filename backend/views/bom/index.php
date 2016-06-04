<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Boms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bom-index">

   <!-- <h1><?php // Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recid',
            'bomlistid',
            'productid',
            'qtyper',
            'type',
            // 'calculation',
            // 'level',

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
    ]); ?>
<?php Pjax::end(); ?></div>
