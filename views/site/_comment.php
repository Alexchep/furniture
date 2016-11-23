<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Furniture';
?>

<?php Pjax::begin(['enablePushState' => false,]) ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'name' => 'leave-comment']]); ?>

        <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', [
                'id' => 'sendComm',
                'class' => 'btn btn-primary',
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>

<?php Pjax::end() ?>