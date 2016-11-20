<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class CategoryController extends Controller
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
        $query = Categories::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $category = $this->findModel($id);

        if($category->parent_id !== null){
            $parent_id = $category->parent_id;
            $parent = $this->findModel($parent_id);
            $parent_name = $parent->name;
        }else{
            $parent_name = 'Отсутствует';
        }

        return $this->render('view', [
            'parent_name' => $parent_name,
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        if($model->parent_id !== null){
            $parent_id = $model->parent_id;
            $parent = $this->findModel($parent_id);
            $parent_name = $parent->name;
        }else{
            $parent_name = 'Отсутствует';
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', [
//                'parent_name' => $parent_name,
//                'id' => $model->id,
//            ]]);
            return $this->render('view', [
                'parent_name' => $parent_name,
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'parent_name' => $parent_name,
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
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

