<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */

$this->title = $model->idBooking;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idBooking], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idBooking], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idBooking',
            'fkUser',
            'fkDoctor',
            'fkSpecialization',
            'desiredDate',
            'confirmIdBooking',
            'emergencyLevel',
            'bookingRemainder',
        ],
    ]) ?>

</div>
