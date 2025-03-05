<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\widgets\Menu;

AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>

  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="google-site-verification" content="RyKxbfyAFBtpgUqIu7ZrOoJHMR0WKO8VVmnnaGgs5Zg" />
  <meta name="google-site-verification" content="PsLOCZyzshm2vyPe0bGHPempIezYdO6ooCDADkgWtyY" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <!-- <title><?= Html::encode($this->title) ?></title> -->
  <title>Situs Resmi JDIH Kota Kendari</title>
  <?php $this->head() ?>

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- aos library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- cart js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .btn-custom {
      background: rgb(255, 129, 11);
      color: #fff;
      font-size: 0.7rem;
      padding: 0px 16px;
      border-radius: 2px;
      text-transform: uppercase;
      font-weight: 600;
      letter-spacing: 0.5px;
      outline: none;
      border: none;
    }

    .btn-custom:hover,
    .btn-custom:focus {
      color: #fff;
    }
  </style>
</head>

<body>

  <?php $this->beginBody() ?>
  <!-- start main-wrapper section -->
  <div class="main-wrapper">
    <!-- start header section -->
    <header>
      <div class="navbar-default" style="border-bottom: 1px solid #616161; background: rgba(7, 7, 7, 0.77); box-shadow: 0px 5px 6px 0px rgba(0, 0, 0, 0.25); backdrop-filter: blur(4px);">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="menu_area">
                <nav class="navbar navbar-expand-lg navbar-light no-padding justify-content-between">
                  <div class="navbar-header navbar-header-custom d-flex align-items-center">
                    <!-- start logo -->
                    <?= Html::a(Html::img('@web/frontend/assets/img/logos/jdul.png', ['id' => 'logo']), ['/'], ['class' => 'navbar-brand']); ?>
                    <!-- end logo -->
                    <div class="title-logo">
                      <p>JARINGAN DOKUMENTASI DAN INFORMASI HUKUM</p>
                      <h3>PEMERINTAH KOTA KENDARI</h3>
                    </div>
                  </div>

                  <div class="navbar-toggler"></div>

                  <!-- start menu area -->
                  <?= $this->render('menu.php') ?>
                  <!-- end menu area -->
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <?= $content ?>

    <?= $this->render('footer.php') ?>
  </div>
  <!-- end main-wrapper section -->

  <!-- start scroll to top -->
  <a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
  <!-- end scroll to top -->

  <!-- all js include start -->

  <!-- jQuery -->


  <!-- all js include end -->

  <?php $this->endBody() ?>

  <!-- Google Analytics Start -->



  <!-- Google Analytics End -->
  <script>
    AOS.init();
  </script>
</body>

</html>
<?php $this->endPage() ?>