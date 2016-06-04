<?php
use execut\widget\TreeView;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$x =[];
foreach ($model as $val){
    array_push($x, ['pid'=> $val->parentbomid,'text'=> $val->prodcode,'nodes'=>[]]);
}


$data = $x;
$onSelect = new JsExpression(<<<JS
function (undefined, item) {
    console.log(item);
}
JS
);

$groupsContent = TreeView::widget([
            'data' => $data,
            'size' => TreeView::SIZE_SMALL,
            'header' => 'รายการเมนู',
            'searchOptions' => [
                'inputOptions' => [
                    'placeholder' => 'Search'
                ],
            ],
            'clientOptions' => [
                'onNodeSelected' => $onSelect,
                'selectedBackColor' => 'rgb(40, 153, 57)',
                'borderColor' => '#fff',
            ],
        ]);
echo $groupsContent;