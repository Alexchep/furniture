<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <h1><?= $this->title = 'Комментарий: ' . $model->id; ?></h1>

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
            'text',
            'author_name',
            'date',
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'value' => $model->status,
                'format' => 'text',
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
        ],
    ]) ?>

</div>
