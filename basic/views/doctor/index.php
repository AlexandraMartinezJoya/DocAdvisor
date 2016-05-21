<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Doctor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'surname',
        	[
        		'label' => 'Address',
        		'content' => function ($data) {
        		
        		$streetName = $data->getIdAddress0()->one()->streetName;
        		$streetNumber = $data->getIdAddress0()->one()->streetNumber;
        		
        		return $streetName .' '. $streetNumber;
        		}
        	],
            'emailAddress:email',
			[
                'label' => 'Specialization',
                'content' => function ($data) {

                    $specialization = $data->getIdSpecialization0()->one()->specName;

                    return $specialization;
                }
            ],
            [
            	'attribute' => 'Photo',
            	'format' => 'raw',
            	'value' => function($data) { 
            		return Html::img(
            				'data:image/jpeg;base64,' . base64_encode($data->photo), 
            				['width'=>'100px']
            		); 
            	}
            ],
            //'photo',
            [
                'label' => 'Works with assirance',
                'content' => function ($data) {
                
                $isAssured = $data->cnas ? 'Yes' : 'No';
                
                return $isAssured;
                },
                //'format' => 'label'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
