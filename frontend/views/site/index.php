<?php

use yii\helpers\Html;
use frontend\models\Dokumen;
use frontend\models\DataPengarang;
use frontend\models\DataSubyek;

$pejabat = [
  [
    'nama'    => 'Amir Hasan, STP, SH, M.Si',
    'jabatan' => 'Pj. Sekretaris Daerah',
    'gambar'  => 'frontend/assets/img/1.jpeg',
  ],
  [
    'nama'    => 'dr. Hj. SISKA KARINA IMRAN, SKM',
    'jabatan' => 'Wali Kota Kendari',
    'gambar'  => 'frontend/assets/img/2.jpg',
  ],
  [
    'nama'    => 'Dr. Kurniawan Ilyas,S.H.,.S.Psi, M.H',
    'jabatan' => 'Kepala Bagian Hukum Setda Kota Kendari',
    'gambar'  => 'frontend/assets/img/3.jpg',
  ]
];
?>

<!-- start banner -->
<section class="bg-img screen-height cover-background line-banner" data-overlay-dark="7" data-background="frontend/assets/img/background.jpg">
  <div class="container position-relative">
    <div class="header-text display-table z-index-1 width-100">
      <div class="display-table-cell">
        <!-- start bannder headline text -->
        <img src="frontend/assets/img/banner/kdi.png" data-aos="fade-up">
        <p class="font-size18 xs-font-size16 text-white text-center" data-aos-delay="200" data-aos="fade-up">
          SELAMAT DATANG DI SITUS RESMI
        </p>
        <hr class="border-heading">
        <h1 class="cd-headline slide col-lg-8 mt-4 mb-3" data-aos="fade-up" data-aos-delay="400">
          JARINGAN DOKUMENTASI DAN INFORMASI HUKUM KOTA KENDARI
        </h1>
        <marquee class="mb-3 col-lg-8" style="color: #fafafa !important; font-size: 20px; padding-left:160px;">"Inae konasara ie'e pinesara inae liasara ie'e pinekasara"</marquee>
        <marquee class="mb-3 col-lg-8" style=" color: #fafafa !important; font-size: 18px;">Siapa yang menghargai adat ia akan dihormati. Siapa yang melanggar adat ia akan diberi sanksi.</marquee>
        <!-- end banner headline text -->

        <div class="box-search col-lg-8">
          <div class="">
            <form id="w0" class="shadow-sm rounded mb-8" action="/dokumen/index" method="get" data-pjax="1">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-9 px-2 mt-2">
                  <input type="text" class="form-control" id="dokumensearch-judul" name="DokumenSearch[judul]" placeholder="Masukkan Kata Kunci Pencarian..">
                </div>
                <button type="submit" class="butn btn-primary col-lg-3 px-2 mt-2">Search <i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
          </div>

          <div class="margin-20px-top xs-margin-20px-top d-flex flex-column justify-content-center align-items-center">
            <span class="margin-10px-right text-white xs-display-block xs-margin-20px-bottom">Pencarian Populer</span>
            <div class="searchs display-inline-block mt-3">
              <ul class="no-margin-bottom">
                <li><?= Html::a('Peraturan', ['dokumen/peraturan'], ['class' => 'text-white']); ?></li>
                <li><?= Html::a('Monografi', ['dokumen/monografi'], ['class' => 'text-white']); ?></li>
                <li><?= Html::a('Artikel', ['dokumen/artikel'], ['class' => 'text-white']); ?></li>
                <li><?= Html::a('Putusan', ['dokumen/putusan'], ['class' => 'text-white']); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- start contact section -->
<section class="bg-theme mb-5 sambutan" style="background-color:#ffffff">
  <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
      <div class="margin-40px-bottom heading">
        <div class="photos" style="margin-bottom: 50px;;">
          <?php foreach ($pejabat as $item) { ?>
            <div class="cards mb-5">
              <img src="<?= $item['gambar'] ?>" alt="image">
              <div class="title" style="left: -30px; bottom:-40px; width: 300px;">
                <h3 style="font-size: 1rem;"><?= $item['nama'] ?></h3>
                <h4><?= $item['jabatan'] ?></h4>
              </div>
            </div>
          <?php } ?>
        </div>
        <!-- Narasi & quotes -->
        <h3 class="text-center mb-0">Narasi & Quotes</h3>
        <div class="d-flex justify-content-center">
          <hr class="border-heading">
        </div>
        <div class="descirption">
          <?= $narasi->text; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end contact section -->

<!-- Start featured categories Section -->
<section class="document_hukum">
  <div class="container">
    <div class="text-center margin-40px-bottom heading">
      <h3 class="margin-10px-bottom">STATISTIK</h3>
      <p>Menyediakan informasi hukum terpercaya untuk membantu Anda mendapatkan wawasan yang Anda butuhkan.</p>
      <div class="row justify-content-center align-items-center">
        <hr class="border-heading">
      </div>
      <!-- <p class="no-margin-bottom">Lorem Ipsum is simply dummy printing</p> -->
    </div>
    <div class="row content">
      <div class="card-model col-sm-6 col-md-4 col-lg-3">
        <a href="dokumen/peraturan">
          <div class="feature-inner display-table">
            <div class="vertical-align-middle">
              <div class="icon">
                <img src="frontend/assets/img/peraturan.svg" alt="">
              </div>
              <div class="content">
                <h6><?= Dokumen::find()->total(1); ?>+</h6>
                <h5 class="font-size20">Peraturan</h5>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="card-model col-sm-6 col-md-4 col-lg-3">
        <a href="dokumen/monografi">
          <div class="feature-inner display-table">
            <div class="vertical-align-middle">
              <div class="icon">
                <img src="frontend/assets/img/monogrofi.svg" alt="">
              </div>
              <div class="content">
                <h6><?= Dokumen::find()->total(2); ?></h6>
                <h5 class="font-size20">Monografi</h5>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="card-model col-sm-6 col-md-4 col-lg-3">
        <a href="dokumen/artikel">
          <div class="feature-inner display-table">
            <div class="vertical-align-middle">
              <div class="icon">
                <img src="frontend/assets/img/artikel.svg" alt="">
              </div>
              <div class="content">
                <h6><?= Dokumen::find()->total(3); ?></h6>
                <h5 class="font-size20">Artikel</h5>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="card-model col-sm-6 col-md-4 col-lg-3">
        <a href="dokumen/putusan">
          <div class="feature-inner display-table">
            <div class="vertical-align-middle">
              <div class="icon">
                <img src="frontend/assets/img/yurisprudensi.svg" alt="">
              </div>
              <div class="content">
                <h6><?= Dokumen::find()->total(4); ?></h6>
                <h5 class="font-size20">Putusan</h5>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="cart">
      <div class="text-center margin-40px-bottom heading">
        <h3 class="margin-10px-bottom">Grafik Peraturan</h3>
        <p>Grafik menampilkan jumlah berkas 5 tahun terkahir dari masing-masing jenis dokumen</p>
        <!-- <a href="#" class="btn btn-primary"><i class="fa-solid fa-chart-column"></i> &nbsp; Lihat Grafik Lainnya</a> -->
        <div class="row justify-content-center align-items-center">
          <hr class="border-heading">
        </div>
      </div>
      <canvas id="myChart"></canvas>
    </div>
  </div>
</section>
<img src="frontend/assets/img/batas.svg" class="mb-5" style="width: 100%;">
<!-- End featured categories Section -->

<!-- Start peraturan terbaru -->
<section class="bg-theme mb-5 sambutan" style="background-color:#ffffff">
  <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
      <div class="margin-40px-bottom heading">
        <div class="d-flex justify-content-between flex-wrap align-items-center">
          <div class="heading">
            <h3 class="mb-0">Peraturan Terbaru</h3>
            <hr class="border-heading">
          </div>
          <?= Html::a('<i class="fa-solid fa-scale-balanced"></i> &nbsp; Peraturan Lainnya', ['dokumen/peraturan'], ['class' => 'btn btn-primary']); ?>
        </div>
        <div class="d-flex card-peraturan mt-5 justify-content-center">
          <?php foreach ($peraturan as $data) : ?>
            <div class="col-lg-5">
              <label><?= "$data->jenis_peraturan $data->tahun_terbit" ?></label>
              <h3><?= $data->pemrakarsa ?></h3>
              <p>
                <?= $data->judul ?>
              </p>
            </div>
          <?php endforeach  ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End peraturan terbaru -->

<!-- Start monografi -->
<section class="document_hukum cover-background bg-img" data-overlay-dark="7" data-background="frontend/assets/img/background-2.jpg">
  <div class="container">
    <div class="text-center margin-40px-bottom heading">
      <h3 class="margin-10px-bottom" style="font-size: 24px; color: #ff891e ;">Monografi Hukum</h3>
      <p style="font-size: 32px; line-height: 40px; font-weight: 600; color: #fafafa;">Buku Tanya Jawab Seputar Pembentukan Peraturan Daerah dan Peraturan Kepala Daerah</p>
      <div class="row justify-content-center align-items-center">
        <hr class="border-heading">
      </div>
    </div>
    <div class="row content-2 mb-5">
      <div class="col-lg-3 mb-5">
        <!-- <img src="https://jdih.denpasarkota.go.id/storage/produk-hukum/monografi-hukum/2022/buku-hukum/Buku_Tanya_Jawab_page-0001.jpg" alt=""> -->
        <?= Html::img('@web/common/dokumen/' . $monografi[0]->gambar_sampul, ['class' => 'rounded']); ?>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex">
              <span class="mr-4"><i class="fa-solid fa-arrow-right"></i></span>
              <div class="content">
                <h3>T.E.U. Badan/Pengarang</h3>
                <?php
                $teu = DataPengarang::find()->where(['id_dokumen' => $monografi[0]->id])->all();
                if (!empty($teu)) {
                  echo '<p>';
                  foreach ($teu as  $data) {
                    echo '- ' . $data->namaPengarang->name;
                  }
                  echo '</p>';
                }
                ?>
                <!-- <p>Direktorat Jenderal Peraturan Perundang-undangan Kemenkumham RI</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="d-flex">
              <span class="mr-4"><i class="fa-solid fa-arrow-right"></i></span>
              <div class="content">
                <h3>Subjek</h3>
                <?php
                $subjek = DataSubyek::find()->where(['id_dokumen' => $monografi[0]->id])->all();
                if (!empty($subjek)) {
                  foreach ($subjek as  $data) {
                    echo '- ' . $data->subyek;
                  }
                }
                ?>
                <!-- <p>PEMBENTUKAN PERATURAN</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="d-flex">
              <span class="mr-4"><i class="fa-solid fa-arrow-right"></i></span>
              <div class="content">
                <h3>Penerbit</h3>
                <p><?= $monografi[0]->penerbit; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="d-flex">
              <span class="mr-4"><i class="fa-solid fa-arrow-right"></i></span>
              <div class="content">
                <h3>Tempat Terbit</h3>
                <p><?= $monografi[0]->tempat_terbit; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="d-flex">
              <span class="mr-4"><i class="fa-solid fa-arrow-right"></i></span>
              <div class="content">
                <h3>Tahun Terbit</h3>
                <p><?= $monografi[0]->tahun_terbit; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <?= Html::a('<i class="fa-solid fa-book"></i> &nbsp;Lihat Detail &nbsp;<i class="fa-solid fa-arrow-right"></i>', ['dokumen/view?id=' . $monografi[0]->id], ['class' => 'btn btn-secondary']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End monografi -->

<!-- start pengumuman -->
<section class="news">
  <div class="container">
    <div class="text-center margin-60px-bottom">
      <h3 class="margin-10px-bottom">Pengumuman Terbaru</h3>
      <p>Menyajikan pengumuman baru up-to-date dari <b>Jaringan Dokumentasi Dan Informasi Hukum Pemerintah Kota Kendari</b></p>
    </div>
    <div class="row pengumuman mx-1">
      <?php foreach ($pengumuman as $data) : ?>
        <div class="col-lg-12 sm-margin-30px-bottom">
          <div class="card row h-100">
            <?php
            // Cek apakah file gambar ada
            $imagePath = Yii::getAlias("@webroot/common/dokumen/{$data->image}");
            $imageUrl = $data->image && file_exists($imagePath) ? '@web/common/dokumen/' . $data->image : 'frontend/assets/img/default.jpg';
            echo Html::img($imageUrl, ['class' => 'card-img-top col-lg-2']);
            ?>

            <div class="card-body padding-30px-all col-lg-10">
              <label for="category">Pemberitahuan Putusan</label>
              <h5 class="card-title font-size22 font-weight-500 magin-20px-bottom">
                <a href="blog-details.html" class="text-extra-dark-gray">
                  <?= Html::a(implode(" ", array_slice(explode(" ", $data->judul), 0, 3)) . ' .....', ['pengumuman/view', 'id' => $data->id]) ?>
                </a>
              </h5>
              <div class="detail">
                <p><i class="fa-regular fa-calendar-days"></i> <?= $data->getTanggal($data->tanggal); ?></p>
              </div>
              <p class="no-margin-bottom"><?= implode(" ", array_slice(explode(" ", strip_tags($data->isi)), 0, 9)) . ' .....' ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="float-right mt-4 link">
      <?= Html::a('<i class="fa-solid fa-bullhorn"></i> &nbsp; Pengumuman Lainnya', ['pengumuman/index'], ['class' => 'btn btn-primary']); ?>
    </div>
  </div>
</section>
<!-- end pengumuman -->

<section class="no-padding video-berita">
  <div class="container">
    <div class="text-center margin-40px-bottom heading">
      <h3 class="margin-10px-bottom" style="color: #ff891e ;">Berita Video Terbaru</h3>
      <p style="font-size: 16px;">Menyajikan berita video dari <b>Jaringan Dokumentasi Dan Informasi Hukum Pemerintah Kota Kendari</b></p>
      <div class="row justify-content-center align-items-center">
        <hr class="border-heading">
      </div>
    </div>
    <div class="row">
      <?php foreach ($video as $data) : ?>
        <div class="col-lg-4 cards">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $data->link ?>" frameborder="0" allowfullscreen></iframe>
          <h3><?= $data->judul ?></h3>
          <p><i class="fa-regular fa-calendar-days"></i> <?= $data->getTanggal($data->tanggal); ?></p>
        </div>
      <?php endforeach  ?>

    </div>
    <div class="float-right mt-4 link">
      <?= Html::a('<i class="fa-solid fa-video"></i> &nbsp; Video Lainnya', ['video/index'], ['class' => 'btn btn-primary']); ?>
    </div>
  </div>
</section>

<!-- Start berita terbaru -->
<?php if (!empty($berita)) : ?>
  <section class="news" style="background: #E5E5E5 ;">
    <div class="container">
      <div class="text-center margin-60px-bottom">
        <h3 class="margin-10px-bottom">Berita Terbaru</h3>
        <p>Kumpulan berita baru up-to-date dari <b>Jaringan Dokumentasi Dan Informasi Hukum Pemerintah Kota Kendari</b></p>
      </div>
      <div class="row">
        <?php foreach ($berita as $data) : ?>
          <div class="col-lg-4 sm-margin-30px-bottom">
            <div class="card h-100">
              <?php
              $imagePath = Yii::getAlias("@webroot/common/dokumen/$data->image");
              $imageUrl = $data->image && file_exists($imagePath) ? "@web/common/dokumen/$data->image" : 'frontend/assets/img/default.jpg';
              echo Html::a(Html::img($imageUrl, ['class' => 'card-img-top rounded']), ['berita/view', 'id' => $data->id]);
              ?>

              <div class="card-body padding-30px-all">
                <div class="margin-10px-bottom">
                  <span><?= $data->getTanggal($data->created_at); ?></span>
                </div>
                <h5 class="card-title font-size22 font-weight-500 magin-20px-bottom">
                  <a href="blog-details.html" class="text-extra-dark-gray"><?= Html::a(implode(" ", array_slice(explode(" ", $data->judul), 0, 3)) . ' .....', ['berita/view', 'id' => $data->id]) ?></a>
                </h5>

                <p class="no-margin-bottom"><?= implode(" ", array_slice(explode(" ", strip_tags($data->isi)), 0, 9)) . ' .....' ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="float-right mt-4 link">
        <?= Html::a('<i class="fa-regular fa-newspaper"></i> &nbsp; Berita Lainnya', ['berita/index'], ['class' => 'btn btn-primary']); ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- End berita terbaru -->


<script>
  // Data untuk PERDA, PERWALI, dan PERDES
  var data = {
    labels: [
      <?php for ($i = date('Y') - 4; $i <= date('Y'); $i++) {
        echo $i . ',';
      } ?>
    ],
    datasets: [{
        label: 'PERATURAN & KEPUTUSAN',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        data: [
          <?php for ($i = date('Y') - 4; $i <= date('Y'); $i++) {
            echo $count[0][$i] . ',';
          } ?>
        ]
      },
      {
        label: 'MONOGRAFI',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        data: [
          <?php for ($i = date('Y') - 4; $i <= date('Y'); $i++) {
            echo $count[1][$i] . ',';
          } ?>
        ]
      },
      {
        label: 'KEPUTUSAN',
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        borderColor: 'rgba(153, 102, 255, 1)',
        borderWidth: 1,
        data: [
          <?php for ($i = date('Y') - 4; $i <= date('Y'); $i++) {
            echo $count[2][$i] . ',';
          } ?>
        ]
      }
    ]
  };

  function getRandomValue() {
    return Math.floor(Math.random() * (80 - 10 + 1) + 10);
  }

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        },

      },

    }
  });
</script>