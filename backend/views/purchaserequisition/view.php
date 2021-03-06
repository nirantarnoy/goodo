<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Purchaserequisition */

$this->title = $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Purchaserequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchaserequisition-view">

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
            'prno',
            'prdate',
            'requiredate',
            'status',
            'approveby',
            'createby',
            'createdate',
            'modifydate',
        ],
    ]) ?>

</div>
