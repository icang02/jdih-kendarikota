<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Video */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="../frontend/assets/img/banner/header.jpg">
    <div class="container">
        <h1>Video</h1>
        <ul class="text-center">
            <li><?= Html::a('Home', ['/']); ?></li>
            <li>
                <span class="active">Video</span>
            </li>
        </ul>
    </div>
</section>

<section class="blogs">
    <div class="container">
        <div class="row">

            <!--  start blog left-->
            <div class="col-lg-8 col-md-12 sm-margin-50px-bottom">
                <div class="posts">
                    <!--  start post-->
                    <div class="post">
                        <div class="post-img">

                            <?= Html::img('@web/common/dokumen/' . $model->image, ['class' => 'rounded']); ?>

                        </div>
                        <div class="content">
                            <div class="blog-list-simple-text post-meta margin-20px-bottom">
                                <div class="post-title">
                                    <h5><?= $model->judul; ?></h5>
                                </div>
                            </div>
                            <div class="margin-30px-bottom" style="text-align: justify;">
                                <p class="margin-30px-bottom"><?= $model->isi; ?></p>
                            </div>

                        </div>
                    </div>
                    <!--  start post-->




                </div>
            </div>
            <!--  end blog left-->

            <!--  start blog right-->
            <div class="col-lg-4 col-md-12 padding-30px-left sm-padding-15px-left">
                <div class="side-bar">
                    <div class="widget search">
                        <div class="widget-title margin-35px-bottom">
                            <h3>Cari Video</h3>
                        </div>
                        <div class="input-group mb-3">


                            <?php

                            $model->judul = '';
                            $form = ActiveForm::begin([
                                'action' =>  Url::to(['/Video/index']),
                                'method' => 'get',
                                'options' => [
                                    'data-pjax' => 1
                                ],
                            ]); ?>


                            <?php
                            /* @var $searchModel app\models\UserSearch */
                            echo $form->field($model2, 'judul', [
                                'template' => '<div class="input-group-append">{input}' .
                                    Html::submitButton('<span class="ti-search"></span>', ['class' => 'btn btn-primary']) .
                                    '</div>',
                            ])->textInput(['placeholder' => 'Search']);
                            ?>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <!--  end blog right-->

        </div>
    </div>
</section>
