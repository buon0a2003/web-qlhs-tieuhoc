<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\User;
use kartik\icons\Icon;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);

    // $menuItems = 

    if (Yii::$app->user->isGuest){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
            'items' => [
                ['label' => 'Login', 'url' => ['/site/login']]
            ]
        ]);
    } else if (User::findIdentity(Yii::$app->user->id)->role_id == 1){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => Icon::show('home') . 'Trang chủ', 'url' => ['/site/index']],
                    ['label' => Icon::show('accessible-icon', ['framework' => Icon::FAB]) . 'Học sinh', 'url' => ['/hocsinh/index']],
                    [
                        'label'=> Icon::show('tasks', ['framework' => Icon::FAS]) .'Điểm',
                        'items'=>[
                            ['label' => Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm Toán', 'url' => ['/chitietdiem/index-toan']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .  'Điểm Tiếng việt', 'url' => ['/chitietdiem/index-tiengviet']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm anh', 'url' => ['/chitietdiem/index']],

                            ['label' => Icon::show('chart-pie', ['framework' => Icon::FAS]) .  'Điểm Tổng kết', 'url' => ['/tongket/index']]
                        ],
                        'contenOptions' => ['class'=>'bg-dark'],
                    ],
                    ['label' =>Icon::show('user-tie', ['framework' => Icon::FAS]) . 'Giáo viên', 'url' => ['/giaovien/index']],
                    ['label' =>Icon::show('school', ['framework' => Icon::FAS]) .  'Lớp', 'url' => ['/lop/index']],
                    ['label' =>Icon::show('user-circle', ['framework' => Icon::FAS]) .  'Tài khoản', 'url' => ['/user/index']],
                    [
                        'label' => Icon::show('user', ['class'=>'fa-1x']) . Yii::$app->user->identity->username,
                        'items' => [
                            ['label' =>  Icon::show('key', ['framework' => Icon::FAS]) .   'Đổi mật khẩu', 'url' => ['/giaovien/update-mat-khau']],
                            ['label' => Icon::show('sign-out-alt', ['framework' => Icon::FAS]) . 'Đăng xuất', 'url' => ['/site/logout'],  'linkOptions' => ['data-method' => 'post'],],
                        ],
                    ]
                ]
            ]);
        } else if (User::findIdentity(Yii::$app->user->id)->role_id == 2){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => Icon::show('home') . 'Trang chủ', 'url' => ['/site/index']],
                    ['label' => Icon::show('accessible-icon', ['framework' => Icon::FAB]) . 'Học sinh', 'url' => ['/hocsinh/index']],
                    [
                        'label'=> Icon::show('tasks', ['framework' => Icon::FAS]) .'Điểm',
                        'items'=>[
                            ['label' => Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm Toán', 'url' => ['/chitietdiem/index-toan']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .  'Điểm Tiếng việt', 'url' => ['/chitietdiem/index-tiengviet']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm anh', 'url' => ['/chitietdiem/index']],

                            ['label' => Icon::show('chart-pie', ['framework' => Icon::FAS]) .  'Điểm Tổng kết', 'url' => ['/tongket/index']]
                        ],
                        'contenOptions' => ['class'=>'bg-dark'],
                    ],
                    [
                        'label' => Icon::show('user', ['class'=>'fa-1x']) . Yii::$app->user->identity->username,
                        'items' => [
                            ['label' =>  Icon::show('key', ['framework' => Icon::FAS]) .   'Đổi mật khẩu', 'url' => ['/giaovien/update-mat-khau']],
                            ['label' => Icon::show('sign-out-alt', ['framework' => Icon::FAS]) . 'Đăng xuất', 'url' => ['/site/logout'],  'linkOptions' => ['data-method' => 'post'],],
                        ],
                    ]        
                ]
            ]);
        } else if (User::findIdentity(Yii::$app->user->id)->role_id == 3){
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
                'items' => [
                    ['label' => Icon::show('home') . 'Trang chủ', 'url' => ['/site/index']],
                    ['label' => Icon::show('accessible-icon', ['framework' => Icon::FAB]) . 'Học sinh', 'url' => ['/hocsinh/index']],
                    [
                        'label'=> Icon::show('tasks', ['framework' => Icon::FAS]) .'Điểm',
                        'items'=>[
                            ['label' => Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm Toán', 'url' => ['/chitietdiem/index-toan']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .  'Điểm Tiếng việt', 'url' => ['/chitietdiem/index-tiengviet']],
                            
                            ['label' =>  Icon::show('hand-point-right', ['framework' => Icon::FAS]) .   'Điểm anh', 'url' => ['/chitietdiem/index']],

                            ['label' => Icon::show('chart-pie', ['framework' => Icon::FAS]) .  'Điểm Tổng kết', 'url' => ['/tongket/index']]
                        ],
                        'contenOptions' => ['class'=>'bg-dark'],
                    ],
                    // ['label' => 'Giáo viên', 'url' => ['/giaovien/index']],
                    // ['label' => 'Lớp', 'url' => ['/lop/index']],
                    [
                        'label' => Icon::show('user', ['class'=>'fa-1x']) . Yii::$app->user->identity->username,
                        'items' => [
                            ['label' =>  Icon::show('key', ['framework' => Icon::FAS]) .   'Đổi mật khẩu', 'url' => ['/giaovien/update-mat-khau']],
                            ['label' => Icon::show('sign-out-alt', ['framework' => Icon::FAS]) . 'Đăng xuất', 'url' => ['/site/logout'],  'linkOptions' => ['data-method' => 'post'],],
                        ],
                    ]        
                ]
            ]);
        }
        
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Hệ thống quản lí học sinh siêu đỉnh <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end">HT nhúng siêu mệt</div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
