<?php

use yii\helpers\Html;
?>

<div class="col-lg-4 col-md-6 col-sm-12 margin-30px-bottom">
  <div class="card border-0 shadow h-100">
    <?php
    // Cek apakah file gambar ada
    $imagePath = Yii::getAlias("@webroot/common/dokumen/{$model->image}");
    $imageUrl = ($model->image && file_exists($imagePath)) ? "@web/common/dokumen/{$model->image}" : '/frontend/assets/img/default.jpg';
    echo Html::a(Html::img($imageUrl, ['class' => 'card-img-top rounded']), ['berita/view', 'id' => $model->id]);
    ?>
    <div class="card-body padding-30px-all">
      <div class="margin-10px-bottom">
        <span><?= $model->getTanggal($model->created_at); ?></span>
      </div>
      <h5 class="card-title font-size22 font-weight-500 magin-20px-bottom">
        <?=
        Html::a(
          implode(" ", array_slice(explode(" ", $model->judul), 0, 4)) . '....',
          ['berita/view', 'id' => $model->id],
          ['class' => 'text-extra-dark-gray']
        );
        ?>
      </h5>
      <p class="no-margin-bottom">
        <?= implode(" ", array_slice(explode(" ", strip_tags($model->isi)), 0, 20)) . '....'; ?>
      </p>
    </div>
  </div>
</div>