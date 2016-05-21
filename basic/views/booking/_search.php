<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookingQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idBooking') ?>

    <?= $form->field($model, 'fkUser') ?>

    <?= $form->field($model, 'fkDoctor') ?>

    <?= $form->field($model, 'fkSpecialization') ?>

    <?= $form->field($model, 'desiredDate') ?>

    <?php // echo $form->field($model, 'confirmIdBooking') ?>

    <?php // echo $form->field($model, 'emergencyLevel') ?>

    <?php // echo $form->field($model, 'bookingRemainder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
