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
        <?= Html::a('Create Hospital', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php GridView::widget([
    		'dataProvider' => $dataProvider, 
    		'columns' => [
    			['class' => 'yii\grid\SerialColumn'],
    			'streetName',
    			'streetNumber'
    ]
    ])
    ?>
</div>
<h1>address/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
