<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1>Категории</h1>

    <p>
        <?= Html::button('Добавить категорию', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'category-button']) ?>
    </p>

    <?php
        Modal::begin([
            'id' => 'modal-category-admin',
            'header' => '<h2>Добавить категорию</h2>',
            'closeButton' => [
                'label' => 'Закрыть',
                'class' => 'btn btn-default btn-sm pull-right',
                'id' => 'close-modal-category',
            ],
            'size' => 'modal-md',
        ]);
        echo "<div id='adminCategory'></div>";
        Modal::end();
    ?>

    <?php Pjax::begin(['enablePushState' => false]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end() ?>

</div>