<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-index">

    <h1>Галерея</h1>

    <p>
        <?= Html::a('Добавить в галерею', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            [
                'label' => 'Изображение',
                'attribute' => 'path_to_pic',
                'value' => function($data){
                    return Html::img(Url::toRoute('@web/web/uploads/'. $data->path_to_pic),[
                        'alt' => $data->title,
                        'style' => 'width: 50px; height: 50px'
                    ]);
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
