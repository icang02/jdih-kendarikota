<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Informasi Hukum */

$this->title = 'Tambah Data Informasi Hukum';
$this->params['breadcrumbs'][] = ['label' => 'Informasi Hukum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body no-padding">

    <?= $this->render('_form-create', [
    'model' => $model,
    ]) ?>
</div>


