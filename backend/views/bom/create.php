<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bom */

$this->title = 'Create Bom';
$this->params['breadcrumbs'][] = ['label' => 'Boms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bom-create">

    <!--<h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
