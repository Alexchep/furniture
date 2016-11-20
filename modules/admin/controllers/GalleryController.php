<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Galleries;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use app\models\ImageForGallery;

class GalleryController extends Controller
{

    public function init()
    {
        parent::init();

        $this->view->title = 'Панель управления';

        $this->layout = '@app/modules/admin/views/layouts/main';
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $category_id = $model->category_id;
        $category_name = $model->getCategoryName($category_id);

        return $this->render('view', [
            'model' => $model,
            'category_name' => $category_name,
        ]);
    }

    public function actionCreate()
    {
        $model = new Galleries();
        $image = new ImageForGallery();
        if ($model->load(Yii::$app->request->post())) {
            $image->picture = UploadedFile::getInstance($model, 'path_to_pic');
            $image->picture->saveAs('uploads/' . $image->picture->name);
            $model->path_to_pic = $image->picture->name;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new ImageForGallery();

        if ($model->load(Yii::$app->request->post())){
            $image->picture = UploadedFile::getInstance($model, 'path_to_pic');
            $image->picture->saveAs('uploads/' . $image->picture->name);
            $model->path_to_pic = $image->picture->name;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Galleries::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
