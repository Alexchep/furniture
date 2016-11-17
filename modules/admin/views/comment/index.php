<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1>Комментарии</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
