<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBooking',
            'fkUser',
            'fkDoctor',
            'fkSpecialization',
            'desiredDate',
            // 'confirmIdBooking',
            // 'emergencyLevel',
            // 'bookingRemainder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
