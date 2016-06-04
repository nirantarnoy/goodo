<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-index">
<div class="panel panel-default">
    <div class="panel-body">
        <div style="width: 100%;height: 50px;background-color: #ffffff">
        <?php //Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        <div class="pull-left">
            <ul class="header-menu" style="float: left;list-style: none;padding: 0;height: 50px;">
            <li><a href="<?= yii\helpers\Url::to("index.php?r=quotation/create")?>"><i class="fa fa-paste"></i> Create</a> </li>
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
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recid',
            'salequoteno',
            'deliverydate',
            'shipdate',
            'customerid',
            // 'currencyid',
            // 'discount',
            // 'discountper',
            // 'vat',
            // 'discountamt',
            // 'discountperamt',
            // 'vatamt',
            // 'totalamt',
            // 'status',
            // 'refer',
            // 'totaltext',
            // 'createdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>