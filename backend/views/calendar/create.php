<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Calendar */

$this->title = 'Create Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
