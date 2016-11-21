<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Galleries;

class GalleryController extends Controller
{

    public function actionIndex()
    {


        return $this->render('index', [
            'model' => $model,
        ]);
    }

}