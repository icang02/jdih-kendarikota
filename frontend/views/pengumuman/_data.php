<?php

use yii\helpers\Html;
?>

<div class="col-lg-12 sm-margin-30px-bottom">
  <div class="card row h-100">
    <?= Html::img(is_file(Yii::getAlias("@webroot/common/dokumen/$model->image")) ? Yii::$app->request->hostInfo . "/common/dokumen/$model->image" : '/frontend/assets/img/default.jpg', ['class' => 'card-img-top col-lg-2']); ?>

    <div class="card-body padding-30px-all col-lg-10">
      <label for="category"><?= $model->tag ?></label>
      <h5 class="card-title font-size22 font-weight-500 magin-20px-bottom">
        <a href="blog-details.html" class="text-extra-dark-gray">
          <?=
          Html::a(implode(" ", array_slice(explode(" ", $model->judul), 0, 4)) . '....', ['pengumuman/view', 'id' => $model->id]);
          ?>
        </a>
      </h5>
      <div class="detail">
        <span><?= $model->getTanggal($model->created_at); ?></span>
      </div>
      <p class="no-margin-bottom"> <?= implode(" ", array_slice(explode(" ", strip_tags($model->isi)), 0, 20)) . '....'; ?></p>
    </div>
  </div>
</div>
