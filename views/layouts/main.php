<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid" id="main-wrap">
    <div class="row-fluid second-wrap">

        <div class="col-md-3 left-panel">
            <!--Sidebar content-->
            <div class="logo">
                <?php echo Html::img('@web/web/logo.png', ['id' => 'logo']) ?>
            </div>
            <div class="nav-bar">
                <ul class="bmenu">
                    <li class="active"><?php echo Html::a('Главная', ['/site/index']) ?></li>
                    <li class="active"><?php echo Html::a('О нас', ['/about/index']) ?></li>
                    <li class="active"><?php echo Html::a('Контакты', ['/contact/index']) ?></li>
                    <li class="active"><?php echo Html::a('Галерея', ['/gallery/index']) ?></li>
                    <li class="active"><?php echo Html::a('Admin', ['/admin/default/login']) ?></li>
                </ul>
            </div>
            <div class="social row-fluid">
                <div class="col-md-12 social-icons">
                    <?php $vk = Html::img('@web/web/uploads/vk.png'); ?>
                    <?php echo Html::a($vk, 'http://vk.com', [
                        'target' => '_blank'
                    ]) ?>
                    <?php $fb = Html::img('@web/web/uploads/facebook.png'); ?>
                    <?php echo Html::a($fb, 'http://facebook.com', [
                        'target' => '_blank'
                    ]) ?>
                    <?php $inst = Html::img('@web/web/uploads/instagram.png'); ?>
                    <?php echo Html::a($inst, 'http://instagram.com', [
                        'target' => '_blank'
                    ]) ?>
                </div>
            </div>
            <div class="menu-footer">
                <div class="row-fluid">
                    <p>&copy; ЧП Кравец <?php echo date('Y') ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-9 main-container">
            <!--Body content-->
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>