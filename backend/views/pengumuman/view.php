<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengumumans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box-body table-responsive no-padding">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <b>Detail Data Pengumuman</b>
    </div>

    <div class="box-body">

      <div class="box-header">
        <?= Html::a('<i class="fa fa-mail-reply"></i> Kembali', ['index'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-pencil"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger btn-flat',
          'data' => [
            'confirm' => 'Yakin menghapus data ini?',
            'method' => 'post',
          ],
        ]) ?>
        <p></p>
      </div>
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id',
          'tanggal',
          'judul',
          'tag',

          [
            'attribute' => 'isi',
            'format' => 'raw',
          ],
          [
            'label' => 'Photo Pengumuman',
            'format' => 'raw',
            'value' => function ($data) {
              $host      = Yii::$app->request->hostInfo;
              $imagePath = is_file(Yii::getAlias("@common/dokumen/$data->image")) ?
                $host . "/common/dokumen/$data->image" :
                $host . "/frontend/assets/img/default.jpg";

              return Html::img($imagePath, ['alt' => 'myImage', 'width' => '300', 'height' => 'auto']);
            },
          ],
          [
            'label' => 'Dokumen Pengumuman',
            'format' => 'html',
            'value' => function ($data) {
              $host      = Yii::$app->request->hostInfo;
              $dokumenPath = is_file(Yii::getAlias("@common/dokumen/$data->dokumen"));

              if ($dokumenPath) {
                $url = "$host/common/dokumen/$data->dokumen";
                return '<a href="' . $url . '">Download</a>';
              } else {
                return '—';
              }
            }
          ],

          'status',
          'created_at:datetime',
          'created_by',
          'updated_at',
          'updated_by',
        ],
      ]) ?>
    </div>
  </div>
</div>