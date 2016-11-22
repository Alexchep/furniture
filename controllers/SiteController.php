<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comments;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $model = new Comments();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->render('index', ['model' => $model]);
        }else{
            return $this->render('index');
        }
    }

}