<?php


use yii\helpers\Html;
use yii\widgets\ListView;


$this->title = 'Informasi Hukum';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="<?= Yii::$app->request->hostInfo ?>/frontend/assets/img/banner/header.jpg">
  <div class="container">
    <h1>Informasi Hukum</h1>
    <ul class="text-center">
      <li><?= Html::a('Home', ['/']); ?></li>
      <li>
        <span class="active">Informasi Hukum</span>
      </li>
    </ul>
  </div>
</section>

<section class="news">
  <div class="container">
    <div class="border-bottom padding-20px-bottom margin-30px-bottom">
      <div class="widget search mb-4">
        <form id="w0" action="/informasi-hukum/index?jenis=<?= $jenis ?>" method="get" data-pjax="1">
          <div class="form-row align-items-center">
            <div class="col-md-10 my-1">
              <input type="hidden" class="form-control" name="jenis" value="<?= $jenis ?>" placeholder="cari informasi hukum lainnya...">
              <input type="text" class="form-control" id="informasi-hukum-search-judul" name="InformasiHukumSearch[judul]" placeholder="cari informasi hukum lainnya...">
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
