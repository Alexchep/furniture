<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-index">

    <h1>Галерея</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить в галерею', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            'path_to_pic',
            'category_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
