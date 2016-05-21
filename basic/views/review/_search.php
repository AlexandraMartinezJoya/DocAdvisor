<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReviewQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idReview') ?>

    <?= $form->field($model, 'idDoctor') ?>

    <?= $form->field($model, 'votesPositive') ?>

    <?= $form->field($model, 'votesNegative') ?>

    <?= $form->field($model, 'maxVotesPerIdDoctor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
