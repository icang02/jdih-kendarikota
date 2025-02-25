<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisInformasiHukum */

$this->title = 'Ubah Data Jenis Informasi Hukum: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Informasi Hukum', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box-body no-padding">

    <?= $this->render('_form-update', [
        'model' => $model,
    ]) ?>

</div>
