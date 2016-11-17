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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                //'value' => '<img src="/web/uploads/' . $model->path_to_pic . '"/>',
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
