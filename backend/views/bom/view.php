<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bom */

$this->title = $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Boms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bom-view">

      <!--<h1><?php // Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->recid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->recid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recid',
            'bomlistid',
            'productid',
            'qtyper',
            'type',
            'calculation',
            'level',
        ],
    ]) ?>

</div>
