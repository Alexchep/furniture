<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use \yii\helpers\Url;
use \yii\widgets\Pjax;

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1>Комментарии</h1>

    <p>

        <?= Html::button('Добавить комментарий', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'comment-button']) ?>
    </p>

    <?php
        Modal::begin([
            'id' => 'modal-comment-admin',
            'header' => '<h2>Добавить комментарий</h2>',
            'closeButton' => [
                'label' => 'Закрыть',
                'class' => 'btn btn-default btn-sm pull-right',
                'id' => 'close-modal-comment',
            ],
            'size' => 'modal-md',
        ]);
        echo "<div id='adminComment'></div>";
        Modal::end();
    ?>

    <?php Pjax::begin(['enablePushState' => false]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'text',
            'author_name',
            'date',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end() ?>

</div>