<?php

use yii\helpers\Html;
use frontend\models\DataLampiran;

$domain = yii\helpers\Url::base(true);
?>

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

<div class="border-bottom margin-40px-bottom padding-40px-bottom xs-padding-20px-bottom">
  <div class="card card-list border-0">
    <div class="row align-items-center">
      <div class="card-body no-padding-tb">
        <div class="d-flex justify-content-between align-items-center">
          <p>
            <?= Html::a(
              $model->bentuk_peraturan . ' &nbsp; (' . $model->tahun_terbit . ')',
              ['/dokumen/index2', 'id' => $model->bentuk_peraturan],
              ['class' => '']
            ); ?>
          </p>
        </div>

        <p>
          <?= Html::a(
            $model->judul,
            ['/dokumen/view', 'id' => $model->id],
            ['class' => 'titles', 'title' => 'lihat detail']
          ); ?>
        </p>

        <div class="d-flex left-content-between align-items-left">
          <?php
          // Cek dan tampilkan tautan lampiran
          $lampiran = DataLampiran::find()->where(['id_dokumen' => $model->id])->one();
          ?>

          <!-- Untuk File Lampiran -->
          <?php if (!empty($lampiran)) { ?>
            <?php $lampiranPath = Yii::getAlias("@webroot/common/dokumen/{$lampiran->dokumen_lampiran}"); ?>

            <?php if (is_file($lampiranPath)) { ?>
              <a style="background: #0069A8;" href="<?= Yii::$app->request->hostInfo ?>/common/dokumen/<?= $lampiran->dokumen_lampiran ?>" class="btn-custom mr-3" target="_blank">
                <i class="fa-solid fa-file-lines"></i>&nbsp; Download
              </a>
            <?php } else { ?>
              <button disabled style="background: #0069A8; opacity: 0.6;" class="btn-custom mr-3">
                <i class="fa-solid fa-file-lines"></i>&nbsp; Download
              </button>
            <?php } ?>
          <?php } else { ?>
            <button disabled style="background: #0069A8; opacity: 0.6;" class="btn-custom mr-3">
              <i class="fa-solid fa-file-lines"></i>&nbsp; Download
            </button>
          <?php } ?>

          <!-- Untuk File Abstack -->
          <?php if (!empty($model->abstrak)) { ?>
            <?php $abstrakPath = Yii::getAlias("@webroot/common/dokumen/{$model->abstrak}"); ?>

            <?php if (is_file($abstrakPath)) { ?>
              <a href="<?= Yii::$app->request->hostInfo ?>/common/dokumen/<?= $model->abstrak ?>" class="btn-custom mr-3" target="_blank">
                Abstrak
              </a>
            <?php } else { ?>
              <button disabled style="opacity: 0.6;" class="btn-custom mr-3">
                Abstrak
              </button>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>