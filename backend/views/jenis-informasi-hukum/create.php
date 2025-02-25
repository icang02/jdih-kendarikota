<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisInformasiHukum */

$this->title = 'Tambah Data Jenis Informasi Hukum';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Informasi Hukum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body no-padding">

    <?= $this->render('_form-create', [
    'model' => $model,
    ]) ?>
</div>


