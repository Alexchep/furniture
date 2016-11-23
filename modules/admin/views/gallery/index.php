<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-index">

    <h1>Галерея</h1>

    <p>
        <?= Html::button('Добавить в галерею', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'gallery-button']) ?>
    </p>

    <?php
        Modal::begin([
            'id' => 'modal-gallery-admin',
            'header' => '<h2>Добавить в галерею</h2>',
            'closeButton' => [
                'label' => 'Закрыть',
                'class' => 'btn btn-default btn-sm pull-right',
                'id' => 'close-modal-gallery',
            ],
            'size' => 'modal-md',
        ]);
        echo "<div id='adminGallery'></div>";
        Modal::end();
    ?>

    <?php Pjax::begin(['enablePushState' => false]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            [
                'attribute'=>'category_id',
                'label'=>'Родительская категория',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getCategoryName($data->category_id);
                },
            ],
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

    <?php Pjax::end() ?>

</div>