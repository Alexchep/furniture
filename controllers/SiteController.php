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
        $comments = Comments::find()->where(['status' => 'Активен'])->all();
//        var_dump($comments);
//        die();
        if($model->load(Yii::$app->request->post())){
            $model->status = 'Неактивен';
            $model->save();
            var_dump($model);
            die();

            return $this->render('index', [
                'model' => $model,
                'comments' => $comments,
            ]);
        }else{
            return $this->render('index', ['comments' => $comments,]);
        }
    }

}