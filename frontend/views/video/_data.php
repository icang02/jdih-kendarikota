<?php

use yii\helpers\Html;
?>

<div class="col-lg-4 cards">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $model->link ?>" frameborder="0" allowfullscreen></iframe>
    <h3><?= $model->judul ?></h3>
    <p><i class="fa-regular fa-calendar-days"></i> <?= $model->getTanggal($model->tanggal); ?></p>
</div>