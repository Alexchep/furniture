<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\i18n\Formatter;
use app\models\Galleries;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            [
                'label' => 'Изображение',
                'value' => '@web/web/uploads/'. $model->path_to_pic,
                'format' => 'image',
                'contentOptions' => ['class' => 'view-img'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'Категория',
                'value' => $category_name,
                'contentOptions' => ['class' => 'view-img'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            //'category_id' => $category_name,
        ],
    ]) ?>

</div>
