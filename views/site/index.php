<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Furniture';
?>
<div class="site-index">

    <div class="body-content">

        <?php $form = ActiveForm::begin(['action' => 'sendComment']); ?>

        <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
