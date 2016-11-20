<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1>Комментарии</h1>

    <p>
        <?= Html::a('Добавить комментарий', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'text',
            'author_name',
            'date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
