<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDoctor') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'idSpecialization') ?>

    <?= $form->field($model, 'idAddress') ?>

    <?php // echo $form->field($model, 'emailAddress') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'cnas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
