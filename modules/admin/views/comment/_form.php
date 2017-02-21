<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

        <?php
            echo $form->field($model, 'status')->dropDownList([
                'Активен' => 'Активен',
                'Неактивен' => 'Неактивен'
            ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
