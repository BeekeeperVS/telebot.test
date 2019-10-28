<?php

/* @var $this View */

/* @var $content string */

use app\assets\AdminAsset;

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);
$pathImg = "/asset_admin/image/";
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $pathImg ?>apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-2">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="black" data-active-color="warning">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
          -->
            <div class="logo">
                <?= Html::beginTag('a', ['class' => 'simple-text logo-mini', 'href' => Url::to('/')]) ?>
                <div class="logo-image-small">
                    <img src="<?= $pathImg ?>logo-small.png" alt="logo">
                </div>
                <?php Html::endTag('a') ?>
                <?= Html::a('TELEGRAM BOT', Url::to('/'), ['class' => 'simple-text logo-normal']) ?>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <!--TELEBOT CHAT-->
                    <?= Html::beginTag('li', [
                        'class' => Yii::$app->controller->route === 'telebot-chat/index' ? 'active' : ''
                    ]); ?>
                    <?= Html::a("<i class='nc-icon nc-bank'></i><p>" . translate('Telebot') . "</p>", ['telebot-chat/index']); ?>
                    <?php Html::endTag('li') ?>

                    <!--SETTING-->
                    <?= Html::beginTag('li', [
                        'class' => Yii::$app->controller->route === 'telebot-configuration/index' ? 'active' : ''
                    ]); ?>
                    <?= Html::a(
                        "<i class='nc-icon nc-bank'></i><p>" . translate('Settings') . "</p>",
                        ['/telebot-configuration']); ?>
                    <?php Html::endTag('li') ?>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>

                        <p class="navbar-brand" ><?= $this->title?></p>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="#pablo">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="#pablo">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- <div class="panel-header panel-header-lg">

        <canvas id="bigDashboardChart"></canvas>


      </div> -->

            <div class="content">
                <nav aria-label="breadcrumb" role="navigation">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'tag' => 'ol',
                        'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                        'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n"
                    ]) ?>
                </nav>
                <?= Alert::widget() ?>
                <?= $content ?>

            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li>
                                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </body>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>