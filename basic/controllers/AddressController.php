<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use app\models\Address;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AddressController extends Controller
{
    public function actionIndex()
    {
    	$dataProvider = new ActiveDataProvider([
    			'query' => Address::find(),
    	]);
        return $this->render('index', [
        		'dataProvider' => $dataProvider,
        ]);
    }

}
