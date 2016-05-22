<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\rating\StarRating;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idDoctor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idDoctor], [
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
            'name',
            'surname',
			[
                'attribute' => 'Specialization',
                'value' => $model->getIdSpecialization0()->one()->specName
            ],
            [
        		'attribute' => 'Address',
        		'value' => $model->getIdAddress0()->one()->streetName .' '.
        		$streetNumber = $model->getIdAddress0()->one()->streetNumber
        	],
            'emailAddress:email',
        	[
        		'attribute' => 'Photo',
        		'format' => 'raw',
        		'value' => Html::img(
            				'data:image/jpeg;base64,' . base64_encode($model->photo), 
            				['width'=>'100px'])
        	],
            [
                'attribute' => 'Works with assirance',
                'value' => $model->cnas ? 'Yes' : 'No'
            ],
        	'phone',
        	[
        		'attribute' => 'Reviews',
        		'format' => 'raw',
        		'value' => StarRating::widget([
    							'name' => 'rating_33',
    							'value' => $model->getReviews()->one()->votes,
    							'disabled' => true
						   ])
        	],
        ],
    ]);
    
    echo '<p class="lead">Please rate this doctor.</p>';
	$form = ActiveForm::begin([
	    'id' => 'login-form',
	    'options' => ['class' => 'form-horizontal'],
		'action' => ['doctor/view'],
		'options' => ['method' => 'post'],
	]);
	echo $form->field($model->getReviews()->one(), 'votes')->widget(StarRating::classname(), [
	    'pluginOptions' => [
	    		'size'=>'sm'
	    ]
	]);?>
	
	<div class="form-group">
	<div class="col-lg-offset-1 col-lg-11">
	<?= Html::submitButton('Vote', ['class' => 'btn btn-primary']) ?>
	        </div>
	    </div>
	
	<?php ActiveForm::end(); ?>

</div>
