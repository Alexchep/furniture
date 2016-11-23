<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\models\Comments;

$this->title = 'Furniture';
?>
<div class="site-index">

    <div class="body-content">

        <div id="alert-div" class="alert alert-success"></div>

        <?php foreach ($comments as $comment): ?>
            <div class="comment-wrap col-md-4">
                <h3><?= $comment->author_name ?></h3>
                <p class="comment-body"><?= $comment->text ?></p>
                <p class="comment-date"><?= $comment->date ?></p>
            </div>
        <?php endforeach; ?>

        <?php
            Modal::begin([
                'id' => 'modal-comment',
                'header' => '<h2>Оставьте комментарий</h2>',
                'toggleButton' => [
                    'label' => 'Оставить комментарий',
                    'class' => 'btn btn-info'
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

    </div>
</div>