<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productcategory */

$this->title = 'Create Productcategory';
$this->params['breadcrumbs'][] = ['label' => 'Productcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productcategory-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
