<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "hospital-index">

	 <h1><?= Html::encode($this->title) ?></h1>
	  <p>
        <?= Html::a('Add Hospital', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
<h1>List of addresses</h1>

<p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'streetName',
            'streetNumber',
        	[
        		'label' => 'City',
        		'content' => function ($data) {
        		$cityName = $data->getFkCity()->one()->name;
        		return $cityName;
        		},
        	],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</p>
