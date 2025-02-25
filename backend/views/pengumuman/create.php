<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */

$this->title = 'Tambah Data Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body no-padding">

    <?= $this->render('_form-create', [
    'model' => $model,
    ]) ?>
</div>


