<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idSpecialization')->textInput() ?>

    <?= $form->field($model, 'idAddress')->textInput() ?>

    <?= $form->field($model, 'emailAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput() ?>

    <?= $form->field($model, 'cnas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
