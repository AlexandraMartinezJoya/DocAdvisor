<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Update Address: ' . $model->idAddress;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAddress, 'url' => ['view', 'id' => $model->idAddress]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
