<?php

use yii\helpers\Html;
use frontend\models\DataLampiran;
use frontend\models\DataPengarang;
use frontend\models\DataSubyek;
/* @var $this yii\web\View */
/* @var $model frontend\models\Dokumen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dokumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="<?= Yii::$app->request->hostInfo . '/frontend/assets/img/banner/header.jpg' ?>">
  <div class="container">
    <h1>Putusan Detail</h1>
    <ul class="text-center">
      <li><?= Html::a('Home', ['/']); ?></li>
      <li><?= Html::a('Putusan', ['/dokumen/putusan']); ?></li>
      <li>
        <span class="active"> <?= $model->jenis_peraturan; ?></span>
      </li>
    </ul>
  </div>
</section>
<!-- end page title section -->

<!-- start blog detail section -->
<section class="blogs">
  <div class="container">
    <div class="border-bottom padding-20px-bottom margin-30px-bottom">
      <div class="widget search mb-4">
        <form id="w0" action="/dokumen/index" method="get" data-pjax="1">
          <div class="form-row align-items-center">
            <div class="col-md-4 my-1">
              <input type="text" class="form-control" id="dokumensearch-judul" name="DokumenSearch[judul]" placeholder="cari dokumen hukum lainnya...">
            </div>
            <div class="col-md-1 my-1">
              <button type="submit" class="butn btn-block">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <!--  start blog left-->

      <div class="col-lg-8 col-md-12 sm-margin-50px-bottom">
        <div class="posts">
          <!--  start post-->

          <div class="content">
            <div class="blog-list-simple-text post-meta margin-20px-bottom">
              <div class="post-title">
                <h5><?= $model->judul; ?></h5>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col-lg-6 col-md-6 mb-3">
                Klasifikasi<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->klasifikasi; ?></span>
              </div>
              <div class="col-lg-6 col-md-6 mb-3">
                Amar Putusan<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->amar_status; ?></span>
              </div>
              <div class="col-lg-6 col-md-6 mb-3">
                Tanggal Dibacakan <br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->tanggal_penetapan; ?></span>
              </div>

              <div class="col-lg-6 col-md-6 mb-3">
                Tingkat Proses<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->sub_klasifikasi; ?></span>
              </div>

              <div class="col-lg-6 col-md-6 mb-3">
                Penggugat/Pemohon<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->pemohon; ?></span>
              </div>
              <div class="col-lg-6 col-md-6 mb-3">
                Tergugat/Termohon<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->termohon; ?></span>
              </div>

              <div class="col-lg-6 col-md-6 mb-3">
                Tempat Pengadilan<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->lembaga_peradilan; ?></span>
              </div>
              <div class="col-lg-6 col-md-6 mb-3">
                Lokasi<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->tempat_terbit; ?></span>
              </div>
              <div class="col-lg-6 col-md-6 mb-3">
                Bahasa<br>
                <span class="text-extra-dark-gray font-weight-600"><?= $model->bahasa; ?></span>
              </div>
            </div>

            <div class="row align-items-end">
              <div class="col-lg-12 col-md-12 mt-4">
                <span class="text-extra-dark-gray font-weight-600">T.E.U BADAN</span><br>
                <table class="table">
                  <thead>
                    <tr class="active">
                      <th>Nama Pengarang</th>
                      <th>Tipe Pengarang</th>
                      <th>Jenis Pengarang</th>
                    </tr>
                  </thead>
                  <?php
                  $teu = DataPengarang::find()->where(['id_dokumen' => $model->id])->all();
                  if (!empty($teu)) {
                    echo '<tbody>';
                    foreach ($teu as  $data) {
                      //echo $data['document_terkait'];
                      echo '<tr><td>' . $data->namaPengarang->name . '</td>';
                      echo '<td>' . $data->tipePengarang->name . '</td>';
                      echo '<td>' . $data->jenisPengarang->name . '</td></tr>';
                    }
                    echo '</tbody>';
                  }
                  ?>
                </table>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col-lg-12 col-md-12 mt-4">
                <span class="text-extra-dark-gray font-weight-600"> SUBJEK : </span>
                <!-- <table class="table">
                                    <thead>
                                        <tr class="active">
                                            <th>Nama Subjek</th>
                                            <th>Tipe Subjek</th>
                                            <th>Jenis Subjek</th>
                                        </tr>
                                    </thead> -->
                <?php
                $subjek = DataSubyek::find()->where(['id_dokumen' => $model->id])->all();
                if (!empty($subjek)) {
                  echo '<tbody>';
                  foreach ($subjek as  $data) {

                    echo  $data->subyek . ' - ';
                  }
                  //echo// '</tbody>';
                }
                ?>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!--  end blog left-->

      <!--  start blog right-->
      <div class="col-lg-4 col-md-12 padding-30px-left sm-padding-15px-left">
        <div class="side-bar">

          <div class="shadow">
            <ul class="list-group mt-2">
              <li class="list-group-item text-center">JENIS DOKUMEN</li>
              <li class="list-group-item list-group-item-primary text-center"><strong><?= $model->jenis_peraturan; ?></strong></li>
            </ul>
          </div>

          <div class="shadow">
            <ul class="list-group mt-2">
              <li class="list-group-item text-center">AMAR PUTUSAN</li>
              <li class="list-group-item list-group-item-danger text-center"><strong><?= $model->amar_status; ?></strong></li>
            </ul>
          </div>



          <div class="widget">
            <div class="widget-title margin-35px-bottom mt-4">
              <h3>Lampiran</h3>
            </div>
            <ul class="widget-list" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
              <?php
              $lampiran = DataLampiran::find()->where(['id_dokumen' => $model->id])->all();
              ?>

              <?php if (count($lampiran) != 0) { ?>
                <?php foreach ($lampiran as $i => $data) { ?>
                  <?php $i += 1; ?>
                  <?php $lampiranPath = Yii::getAlias("@webroot/common/dokumen/{$data->dokumen_lampiran}"); ?>

                  <?php if (is_file($lampiranPath)) { ?>
                    <a style="background: #0069A8;" href="<?= Yii::$app->request->hostInfo ?>/common/dokumen/<?= $data->dokumen_lampiran ?>" class="btn-custom" target="_blank">
                      <i class="fa-solid fa-file-lines"></i>&nbsp; Lampiran <?= $i ?>
                    </a>
                  <?php } else { ?>
                    <button disabled style="background: #0069A8; opacity: 0.6;" class="btn-custom">
                      <i class="fa-solid fa-file-lines"></i>&nbsp; Lampiran <?= $i ?>
                    </button>
                  <?php } ?>
                <?php } ?>
              <?php } else { ?>
                <button disabled style="background: #0069A8; opacity: 0.6;" class="btn-custom">
                  <i class="fa-solid fa-file-lines"></i>&nbsp; Lampiran
                </button>
              <?php } ?>

              <!-- Untuk File Abstack -->
              <?php if (!empty($model->abstrak)) { ?>
                <?php $abstrakPath = Yii::getAlias("@webroot/common/dokumen/{$model->abstrak}"); ?>

                <?php if (is_file($abstrakPath)) { ?>
                  <a href="<?= Yii::$app->request->hostInfo ?>/common/dokumen/<?= $model->abstrak ?>" class="btn-custom " target="_blank">
                    Abstrak
                  </a>
                <?php } else { ?>
                  <button disabled style="opacity: 0.6;" class="btn-custom">
                    Abstrak
                  </button>
                <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <!--  end blog right-->
    </div>
  </div>
</section>