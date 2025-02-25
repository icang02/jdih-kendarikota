<?php

use yii\helpers\Html;
?>
<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="../frontend/assets/img/banner/header.jpg">
  <div class="container">
    <h1>Struktur Organisasi</h1>
    <ul class="text-center">
      <li><?= Html::a('Home', ['/']); ?></li>
      <li>
        <span class="active">Tentang Kami</span>
      </li>
    </ul>
  </div>
</section>

<section>
  <div class="container">
    <!-- <h4>STRUKTUR ORGANISASI JDIH KOTA KENDARI</h4> -->
    <center> <?= Html::img('@web/frontend/assets/img/jdih/1.png', ['class' => 'width-87 margin-10px-bottom xs-margin-5px-bottom']); ?>
      <!-- <br>
    <br>
    <h4>STRUKTUR TIM PENGELOLA JDIH KOTA KENDARI</h4> -->
      <br>
      <br>
      <?= Html::img('@web/frontend/assets/img/jdih/2.png', ['class' => 'width-70 margin-10px-bottom margin-0px-left xs-margin-5px-bottom']); ?>
    </center>
  </div>
</section>