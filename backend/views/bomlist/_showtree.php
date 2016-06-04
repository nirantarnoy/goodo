<?php
use execut\widget\TreeView;
use yii\web\JsExpression;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$x =[];
foreach ($model as $val){
     if (count(getChild($val->childid)) > 0) {
        $xxx = getChild($val->childid);
       // array_push($x, ['pid'=> $val->parentbomid,'text'=> $val->prodcode,'nodes'=>$xxx]);
        array_push($x, ['pid'=> $val->childid,'text'=> $val->childcode.'/'.$val->qtyper.'/'.$val->unitname,'nodes'=>$xxx]);
     }else{
         array_push($x, ['pid'=> $val->childid,'text'=> $val->childcode.'/'.$val->qtyper.'/'.$val->unitname,'nodes'=>[]]);
     }
}

function getChild($parentid) {
    $rx = [];
    $rx2 = [];
    $model = app\models\VBomstructure::find()->where(['parentbomid' => $parentid])->all();
    if (count($model) > 0) {
        foreach ($model as $val) {
            if (count(getChild($val->childid)) > 0) {
                $rx2 = getChild($val->childid);
                array_push($rx, ['pid' => $val->childid,'text' => $val->childcode.'/'.$val->qtyper.'/'.$val->unitname, 'nodes' => $rx2]);
            } else {
                array_push($rx, ['pid' => $val->childid,'text' => $val->childcode.'/'.$val->qtyper.'/'.$val->unitname, 'nodes' => []]);
            }
        }
        return $rx;
    } else {
        return $rx;
    }
}

$data = $x;
$onSelect = new JsExpression(<<<JS
function (undefined, item) {
    console.log(item);
}
JS
);
\yii\widgets\Pjax::begin();
$groupsContent = TreeView::widget([
            'data' => $data,
            'size' => TreeView::SIZE_NORMAL,
            'header' => 'Treeview',
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
?>

<div class="row">
    <div class="col-lg-8">
        
         <div class="panel panel-success">
            <div class="panel-heading">
                <h5>Options</h5>
            </div>
            <div class="panel-body">
              <?php echo $groupsContent;?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h5>Options</h5>
            </div>
            <div class="panel-body">
               <label class="checkbox-inline"><input type="checkbox" value="">Qty</label>
               <label class="checkbox-inline"><input type="checkbox" value="">Unit</label>
               <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
            </div>
        </div>
    </div>
</div>
<?php \yii\widgets\Pjax::end();?>
