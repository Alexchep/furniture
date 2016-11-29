<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\models\Comments;

$this->title = 'О нас';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="body-content">

        <div class="col-md-12 page-about">

            <div id="alert-div" class="alert alert-success"></div>

            <?php
            Modal::begin([
                'id' => 'modal-comment',
                'header' => '<h2>Оставьте отзыв</h2>',
                'toggleButton' => [
                    'label' => 'Оставить отзыв',
                    'class' => 'btn btn-info',
                    'id' => 'leave-com'
                ],
                'closeButton' => [
                    'label' => 'Закрыть',
                    'class' => 'btn btn-default btn-sm pull-right',
                    'id' => 'close-modal',
                ],
                'size' => 'modal-sm',
            ]);
            $model = new Comments();
            echo $this->render('_comment', ['model' => $model]);
            Modal::end();
            ?>

            <?php foreach ($comments as $comment): ?>
                <div class="comment-wrap col-md-4">
                    <h3><?= $comment->author_name ?></h3>
                    <p class="comment-body"><?= $comment->text ?></p>
                    <p class="comment-date"><?= $comment->date ?></p>
                </div>
            <?php endforeach; ?>

        </div

    </div>

</div>
