<?php


use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;


$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="../frontend/assets/img/banner/header.jpg">
    <div class="container">
        <h1>Pengumuman</h1>
        <ul class="text-center">
            <li><?= Html::a('Home', ['/']); ?></li>
            <li>
                <span class="active">Pengumuman</span>
            </li>
        </ul>
    </div>
</section>


<section class="news">
    <div class="container">
        <div class="border-bottom padding-20px-bottom margin-30px-bottom">
            <div class="widget search mb-4">
                <form id="w0" action="/pengumuman/index" method="get" data-pjax="1">
                    <div class="form-row align-items-center">
                        <div class="col-md-10 my-1">
                            <input type="text" class="form-control" id="pengumumansearch-judul" name="PengumumanSearch[judul]" placeholder="cari pengumuman lainnya...">
                        </div>
                        <div class="col-md-2 my-1">
                            <button type="submit" class="butn btn-block">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pengumuman">
            <?= ListView::widget(
                [
                    'summary' => false,
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    // 'itemOptions' => ['tag' => null],
                    'options'      => [
                        'tag' => false,
                    ],
                    'itemOptions'  => [
                        'tag' => false,
                    ],
                    'itemView' => function ($model, $key, $index, $widget) {
                        $itemContent = $this->render(
                            '_data',
                            [
                                'model' => $model,
                                'index' => $index,
                                'key' => $key
                            ]
                        );
                        return $itemContent;
                    }

                ]
            );
            ?>
        </div>
    </div>
</section>
</div>