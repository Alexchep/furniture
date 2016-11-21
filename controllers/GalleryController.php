<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Galleries;
use yii\data\ActiveDataProvider;

class GalleryController extends Controller
{

    public function actionIndex()
    {
        $query = Galleries::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}