<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Video */

$this->title = 'Tambah Data Video';
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body no-padding">

    <?= $this->render('_form-create', [
    'model' => $model,
    ]) ?>
</div>


