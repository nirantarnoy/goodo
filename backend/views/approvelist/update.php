<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Approvelist */

$this->title = 'Update Approvelist: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Approvelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="approvelist-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
