<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Categories;
use yii\helpers\ArrayHelper;

?>

<div class="galleries-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <?php if(isset($model->path_to_pic)): ?>
        <div class="edit-img">
            <?php echo Html::img('@web/uploads/'. $model->path_to_pic) ?>
        </div>
        <?php echo $form->field($model, 'path_to_pic')->fileInput() ?>
    <?php else: ?>
        <?php echo $form->field($model, 'path_to_pic')->fileInput() ?>
    <?php endif; ?>


    <?php
        $galleries = Categories::find()->all();

        $items = ArrayHelper::map($galleries, 'id', 'name');

        $params = [
            'prompt' => 'Выберите категорию...'
        ];
        echo $form->field($model, 'category_id')->dropDownList($items, $params);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>