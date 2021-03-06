<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionGallery()
    {
        return $this->render('gallery');
    }

    public function actionAddComment()
    {

        return $this->render('comment');
    }

}
