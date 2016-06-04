<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bomlist */

$this->title = 'Update Bomlist: ' . ' ' . $model->bomname;
$this->params['breadcrumbs'][] = ['label' => 'Bomlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bomname, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bomlist-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelline'=>$modelline,
    ]) ?>

</div>
