<?php

use frontend\models\JenisInformasiHukum;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Informasi Hukum */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informasi Hukum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="../frontend/assets/img/banner/header.jpg">
  <div class="container">
    <h1>Informasi Hukum</h1>
    <ul class="text-center">
      <li><?= Html::a('Home', ['/']); ?></li>
      <li>
        <span class="active">Informasi Hukum</span>
      </li>
    </ul>
  </div>
</section>

<section class="blogs pengumumans">
  <div class="container">
    <div class="row">
      <!--  start blog left-->
      <div class="col-lg-9 col-md-12 sm-margin-50px-bottom">
        <div class="posts">
          <!--  start post-->
          <div class="post">
            <div class="blog-list-simple-text post-meta margin-20px-bottom">
              <div class="post-title">

                <label for="category">
                  <?php
                  $jenis = JenisInformasiHukum::findOne($model->jenis);
                  echo $jenis->singkatan;
                  ?>
                </label>
                <h5><?= $model->judul; ?> </h5>
                <div class="detail">
                  <p><i class="fa-regular fa-calendar-days"></i> <?= $model->getTanggal($model->tanggal); ?> </p>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="post-img col-lg-4 mb-4">
                <?= Html::img(is_file(Yii::getAlias("@webroot/common/dokumen/$model->image")) ? Yii::$app->request->hostInfo . "/common/dokumen/$model->image" : '/frontend/assets/img/default.jpg', ['class' => 'rounded']); ?>

                <div class="mt-4">
                  <?php if (!empty($model->dokumen)) { ?>
                    <?php if (is_file(Yii::getAlias("@webroot/common/dokumen/$model->dokumen"))) { ?>
                      <a target="_blank" href="<?= Yii::$app->request->hostInfo . "/common/dokumen/$model->dokumen" ?>" class="btn-custom py-2">
                        <i class="fa-solid fa-file-arrow-down"></i> &nbsp; Download Dokumen
                      </a>
                    <?php } else { ?>
                      <button disabled style="opacity: 0.5;" class="btn-custom">
                        <i class="fa-solid fa-file-arrow-down"></i> &nbsp; Download Dokumen
                      </button>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
              <div class="content col-lg-8">
                <div class="" style="text-align: justify;">
                  <p class="margin-30px-bottom"><?= $model->isi; ?> </p>
                </div>
              </div>
            </div>
            <hr>

            <?php if (!empty($model->dokumen) && is_file(Yii::getAlias("@webroot/common/dokumen/$model->dokumen"))) { ?>
              <iframe src="<?= Yii::$app->request->hostInfo . "/common/dokumen/$model->dokumen" ?>" width="100%" height="600" style="border: 1px solid; border-radius: 16px;" allowfullscreen></iframe>
            <?php } ?>
          </div>
          <!--  start post-->
        </div>
      </div>
      <!--  end blog left-->

      <!--  start blog right-->
      <div class="col-lg-3 col-md-12 padding-30px-left sm-padding-15px-left">
        <div class="side-bar">
          <div class="widget search my-0">
            <div class="widget-title">
              <h3>Cari Informasi Hukum</h3>
            </div>
            <div class="input-group my-0">
              <?php
              $model->judul = '';
              $form = ActiveForm::begin([
                'action' =>  Url::to(['/informasi-hukum/index?jenis=' . $model->jenis]),
                'method' => 'get',
                'options' => [
                  'data-pjax' => 1
                ],
              ]); ?>
              <?php
              /* @var $searchModel app\models\UserSearch */
              echo $form->field($model2, 'judul', [
                'template' => '<div class="input-group-append">{input}' .
                  Html::submitButton('<span class="ti-search"></span>', ['class' => 'btn btn-primary']) .
                  '</div>',
              ])->textInput(['placeholder' => 'Search']);
              ?>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
          <h3 class="mt-4">Terbaru</h3>
          <div class="section new">
            <div class="row">
              <?php foreach ($terbaru as $terbaru) : ?>
                <div class="col-lg-12">
                  <?= Html::img(is_file(Yii::getAlias("@webroot/common/dokumen/$model->image")) ? Yii::$app->request->hostInfo . "/common/dokumen/$model->image" : '/frontend/assets/img/default.jpg', ['class' => 'rounded']); ?>

                  <?=
                  Html::a(implode(" ", array_slice(explode(" ", $terbaru->judul), 0, 4)) . '....', ["informasi-hukum/view/$terbaru->id"]);
                  ?>
                  <div class="detail">
                    <p><i class="fa-regular fa-calendar-days"></i> &nbsp; <?= $terbaru->getTanggal($terbaru->tanggal) ?></p>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <hr>
          <h3 class="mt-4">Berita Video Terbaru</h3>
          <div class="section new">
            <div class="row">
              <?php foreach ($video as $video) : ?>
                <div class="col-lg-12">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video->link ?>" frameborder="0" allowfullscreen></iframe>
                  <h5><?= $video->judul ?></h5>
                </div>
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
      <!--  end blog right-->

    </div>
  </div>
</section>
