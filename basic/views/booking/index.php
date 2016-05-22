<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\base\Widget;
/* @var $this yii\web\View */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class = "bookings-index">

	 <h1><?= Html::encode($this->title) ?></h1>
	  <p>
        <?= Html::a('Add Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

<h1>List of active bookings !!! UNDER CONSTRUCTION !!!</h1>
<p>
</p>
