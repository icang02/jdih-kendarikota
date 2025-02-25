<?php

use yii\helpers\Html;
use frontend\models\DataLampiran;

$domain = yii\helpers\Url::base(true);

?>
<div class="border-bottom margin-40px-bottom padding-40px-bottom xs-padding-20px-bottom">
    <div class="card card-list border-0">
        <div class="row align-items-center">
            <div class="card-body no-padding-tb">
                <div class="d-flex justify-content-between align-items-center">
                    <p>
                        <?= Html::a($model->bentuk_peraturan, ['/dokumen/index2', 'id' => $model->bentuk_peraturan], ['class' => '']); ?> &nbsp; (<?= $model->tahun_terbit; ?>)
                    </p>
                </div>

                <p>
                    <?=
                    Html::a($model->judul, ['/dokumen/view', 'id' => $model->id], ['class' => 'titles', 'title' => 'lihat detail']);
                    ?>
                </p>
                <div class="d-flex left-content-between align-items-left">
                    <?php
                    $lampiran = DataLampiran::find()->where(['id_dokumen' => $model->id])->one();

                    if (!empty($lampiran)) {
                        // echo  Html::a('<i class="fa-solid fa-file-lines"></i> &nbsp; Download Dokumen', ['/common/dokumen/' . $lampiran->dokumen_lampiran], ['class' => 'mr-3 links', 'target' => '_blank', 'title' => 'lihat file']);
                        echo '<a href="/common/dokumen/' . $lampiran->dokumen_lampiran . '" class="mr-3 links" target="_blank" title="lihat file">
                            <i class="fa-solid fa-file-lines"></i> &nbsp; Download Dokumen
                        </a>';
                    }

                    if (!empty($model->abstrak)) {
                        echo '<br>';
                        // echo  Html::a('Abstrak', ['/common/dokumen/' . $model->abstrak], ['class' => ' mr-3', 'target' => '_blank', 'title' => 'lihat file']);
                        echo '<a href="/common/dokumen/' . $model->abstrak . '" class="mr-3" target="_blank" title="lihat file">Abstrak</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>