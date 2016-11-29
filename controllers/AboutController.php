<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comments;

class AboutController extends Controller
{

    public function actionIndex()
    {
        $model = new Comments();
        $comments = Comments::find()->where(['status' => 'Активен'])->all();
        if($model->load(Yii::$app->request->post())){
            $model->status = 'Неактивен';
            $model->save();

            return $this->render('index', [
                'model' => $model,
                'comments' => $comments,
            ]);
        }else{
            return $this->render('index', ['comments' => $comments,]);
        }
    }

}
