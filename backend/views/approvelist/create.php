<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Approvelist */

$this->title = 'Create Approvelist';
$this->params['breadcrumbs'][] = ['label' => 'Approvelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approvelist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
