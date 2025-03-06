<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="box-header">
  <?= Html::a('<i class="fa fa-mail-reply"></i> Kembali', ['index'], ['class' => 'btn btn-success btn-flat']) ?>
  <?= Html::a('<i class="fa fa-pencil"></i> Ubah Data Utama', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>

  <?= Html::a('<i class="fa fa-pencil"></i> Ubah Dokumen', ['ubah-lampiran', 'id' => $model->id], ['class' => 'btn btn-danger btn-flat']) ?>
  <p></p>
  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'jenis_peraturan',
      //'bentuk_peraturan',
      [
        'attribute' => 'singkatan_jenis',
        'label' => 'Singkatan Peraturan',
      ],

      'nomor_peraturan',

      [
        'attribute' => 'tahun_terbit',
        'label' => 'Tahun',
        ''
      ],

      [
        'attribute' => 'judul',
        'label' => 'Judul Peraturan',
      ],

      [
        'attribute' => 'tempat_terbit',
        'label' => 'Tempat Penetapan',
      ],
      [
        'label' => 'Tanggal Penetapan',
        'value' => $model->getTanggal($model->tanggal_penetapan),
      ],
      [
        'label' => 'Tanggal Pengundangan',
        'value' => $model->getTanggal($model->tanggal_pengundangan),
      ],

      'sumber:ntext',
      'bahasa:ntext',
      'bidang_hukum:ntext',


      // [
      //     'label' => 'Dokumen Lampiran',
      //     'format' => 'html',
      //     'value' => function ($data) {
      //         return Html::a($data->dokumen->dokumen_lampiran, ['download-peraturan', 'id' => $data->id], ['target' => '_blank']);
      //     }
      // ],


      [
        'label' => 'Dokumen Lampiran',
        'format' => 'html',
        'value' => function ($data) {
          $host        = Yii::$app->request->hostInfo;
          $dokumenPath = is_file(Yii::getAlias("@common/dokumen/" . $data->dokumen->dokumen_lampiran));

          if ($dokumenPath) {
            $url = "$host/common/dokumen/" . $data->dokumen->dokumen_lampiran;
            return '<a href="' . $url . '">Download Lampiran</a>';
          } else {
            return '—';
          }
        }
      ],
      [
        'label' => 'Dokumen Abstrak',
        'format' => 'html',
        'value' => function ($data) {
          $host        = Yii::$app->request->hostInfo;
          $dokumenPath = is_file(Yii::getAlias("@common/dokumen/" . $data->abstrak));

          if ($dokumenPath) {
            $url = "$host/common/dokumen/" . $data->abstrak;
            return '<a href="' . $url . '">Download Abstrak</a>';
          } else {
            return '—';
          }
        }
      ],
      // [
      //     'label' => 'Judul Lampiran',
      //     'value'=>function($data){
      //         return $data->dokumen->judul_lampiran;}
      // ],

      [
        'attribute' => 'status',
        'label' => 'Status Peraturan',
      ],

      [
        'attribute' => 'status_terakhir',
        'label' => 'Keterangan Status',
      ],

      [
        'attribute' => 'created_at',
        'value' => function ($data) {
          return $data->getTanggal2($data->created_at);
        },
      ],

      [
        'attribute' => 'created_by',
        'value' => function ($data) {
          return $data->getUserInput($data->_created_by);
        },
      ],
      [
        'attribute' => 'updated_at',
        'value' => function ($data) {
          return $data->getTanggal2($data->updated_at);
        },
      ],
      [
        'attribute' => 'updated_by',
        'value' => function ($data) {
          return $data->getUserInput($data->_updated_by);
        },
      ],
    ],
  ]) ?>
</div>