<?php

use yii\helpers\Html;

$this->title = 'Создание комментария';
$this->params['breadcrumbs'][] = ['label' => 'Комментирии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
