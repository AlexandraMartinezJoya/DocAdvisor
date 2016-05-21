<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkUser')->textInput() ?>

    <?= $form->field($model, 'fkDoctor')->textInput() ?>

    <?= $form->field($model, 'fkSpecialization')->textInput() ?>

    <?= $form->field($model, 'desiredDate')->textInput() ?>

    <?= $form->field($model, 'confirmIdBooking')->textInput() ?>

    <?= $form->field($model, 'emergencyLevel')->textInput() ?>

    <?= $form->field($model, 'bookingRemainder')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
