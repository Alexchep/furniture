<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{

    public function init()
    {
        parent::init();
        $this->view->title = 'Панель управления';
        $this->layout = '@app/modules/admin/views/layouts/main';
    }


    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
