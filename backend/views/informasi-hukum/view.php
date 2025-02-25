<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Informasi Hukum */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informasi Hukums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box-body table-responsive no-padding">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">

            <b>Detail Data Informasi Hukum</b>
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

                    [
                        'attribute' => 'isi',
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Photo Informasi Hukum',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img(\Yii::getAlias('@imageurl') . '/common/dokumen/' . $data->image, ['alt' => 'myImage', 'width' => '300', 'height' => 'auto']);
                        },
                    ],
                    [
                        'label' => 'Dokumen Informasi Hukum',
                        'format' => 'html',
                        'value' => function ($data) {
                            if (empty($data->dokumen)) {
                                return '-';
                            } else {
                                //return Html::a($data->dokumen->dokumen_lampiran, ['download-peraturan', 'id' => $data->id], ['target' => '_blank']);
                                return Html::a($data->dokumen, ['../common/dokumen/' . $data->dokumen], ['target' => '_blank', 'title' => 'lihat file']);
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