<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;
use yii\helpers\ArrayHelper;

?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $action = Yii::$app->requestedAction->actionMethod;
    //$model = Categories::findOne($model->id);
    $cat_name = $model->getListWithoutSelectCat($model->id);
//    var_dump($cat_name);
//    die();
    ?>

    <?php if($action == "actionCreate"): ?>
        <?php
            $categories = Categories::find()->all();

            $items = ArrayHelper::map($categories, 'id', 'name');

            $params = [
                'prompt' => 'Выберите родительскую категорию...'
            ];
            echo $form->field($model, 'parent_id')->dropDownList($items, $params);
        ?>
    <?php elseif($action == "actionUpdate"): ?>
        <?php
            $categories = $cat_name;
//            $categories = Categories::find()->all();
//            $items = ArrayHelper::map($categories, 'id', 'name');

            $params = [
                'prompt' => 'Выберите родительскую категорию...'
            ];
            echo $form->field($model, 'parent_id')->dropDownList($categories, $params);
        ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>