<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bom */

$this->title = 'Update Bom: ' . ' ' . $model->bomname;
$this->params['breadcrumbs'][] = ['label' => 'Boms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bom-update">

      <!--<h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
