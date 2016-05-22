<?php

/* @var $this yii\web\View */
/* This is the part of the code where i have to implement the backround */

use yii\bootstrap\Dropdown;
use yii\jui\AutoComplete;
use app\models\City;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Doctor;

$this->title = 'DocAdvisor';
?>
<div class="site-index">

    <div class="jumbotron">
<!--         <h1>Congratulations!</h1> -->

<!--         <p class="lead">You have successfully created your Yii-powered application.</p> -->

<!--         <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
        <table width="100%">
        	<tr>
        		<td width="40%">
        			<?php
        			echo Select2::widget([
        					'name' => 'state_10',
        					'data' => ArrayHelper::map(City::find()->all(), 'id_city', 'name'),
        					'options' => [
        							'placeholder' => 'Select locations ...',
        							'multiple' => false
        					],
        			]);
        			?>
        		</td>
        		<td width="40%">
        		        <?php

        // Display the doctor list.
        echo Select2::widget([
            'name' => 'state_10',
            'data' => ArrayHelper::map(Doctor::find()->all(), 'idDoctor', 'name'),
            'options' => [
                'placeholder' => 'Find a doctor',
                'multiple' => false
            ],
        ]);
        ?>
        		</td>
        	</tr>
        </table>
    </div>

    <div class="body-content">
<div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Hospitals</h2>

                <p>Search throught a list of hospitals to see which one will suit your needs.</p>

                	<img 
                		src="<?php echo Yii::$app->request->baseUrl . '/' . 'img' . '/hospital-news-content.jpg';?>"
                		width="200px"
                		height="50px"
                	/>
                	<br/>
                	<br/>
                	<br/>
                	<a class="btn btn-default" href="<?php echo Url::to(['address/index']) ?>">
                		List &raquo;
                	</a>

            </div>
            <div class="col-lg-4">
                <h2>Doctors</h2>

				<p>Find the speicalist you need.</p>
				
				<img 
                	src="<?php echo Yii::$app->request->baseUrl . '/' . 'img' . '/doctor.jpg';?>"
                	width="200px"
                	height="100px"
                />
                	<br/>
                	<br/>
                	<br/>
                <p>
                	<a class="btn btn-default" href="<?php echo Url::to(['doctor/index']) ?>">
                	List &raquo;
                	</a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Booking</h2>

                <p>Make an appointment to a doctor you want.</p>
                
                <img 
                	src="<?php echo Yii::$app->request->baseUrl . '/' . 'img' . '/booking-keyboard.jpg';?>"
                	width="200px"
                	height="100px"
                />
<br/>
                	<br/>
                	<br/>
                <p>
                	<a class="btn btn-default" href="<?php echo Url::to(['booking/index']) ?>">
                		Booking &raquo;
                	</a>
                </p>
            </div>
        </div>
</div>
    </div>
</div>
