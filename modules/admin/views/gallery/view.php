<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\i18n\Formatter;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
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
            'id',
            'title',
            'description:ntext',
            [
                'label' => 'Изображение',
                'value' => '@web/web/uploads/'. $model->path_to_pic,
                'format' => 'image',
                'contentOptions' => ['class' => 'view-img'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            //'path_to_pic',
            'category_id',
        ],
    ]) ?>

</div>
