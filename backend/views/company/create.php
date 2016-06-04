<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Company */

$this->title = 'Company Profile';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

   <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2'=>$model2,
    ]) ?>

</div>
