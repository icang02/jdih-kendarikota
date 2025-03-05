<?php

use yii\helpers\Html;
use frontend\models\Pengunjung;

$pengunjung = Pengunjung::findOne(1);
// if ($pengunjung->hari != date('Y-m-d'))
//     $pengunjung->jumlah_perhari = 1;
// else
//     $pengunjung->jumlah_perhari = $pengunjung->jumlah_perhari + 1;

// if ($pengunjung->bulan != date('Y-m'))
//     $pengunjung->jumlah_bulan = 1;
// else
//     $pengunjung->jumlah_bulan = $pengunjung->jumlah_bulan + 1;

// $pengunjung->hari = date('Y-m-d');
// $pengunjung->bulan = date('Y-m');


// $pengunjung->jumlah_keseluruhan = $pengunjung->jumlah_keseluruhan + 1;

// $pengunjung->save();
?>
<!-- start footer section -->

<footer>
  <div class="footer-area padding-90px-tb md-padding-70px-tb sm-padding-50px-tb">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 sm-margin-40px-bottom">

          <!-- start logo -->
          <?= Html::img('@web/frontend/assets/img/logos/jdul.png', ['class' => 'margin-10px-bottom xs-margin-5px-bottom']); ?>

          <!-- end logo -->
          <p class="paragraph">JDIH Kota Kendari hadir untuk meningkatkan pelayanan kepada masyarakat atas kebutuhan dokumentasi dan informasi hukum secara lengkap, akurat, mudah dan cepat.</p>
        </div>

        <div class="col-lg-3 col-sm-6 mobile-margin-40px-bottom">
          <h3 class="footer-title-style1">Tautan</h3>
          <ul class="list-style-1 no-margin-bottom">
            <li><a href="https://www.kemenkumham.go.id/">Portal Kemenkumham R.I.</a></li>
            <li><a href="https://www.bphn.go.id/">Portal BPHN</a></li>
            <li><a href="https://jdihn.go.id/">Portal JDIHN</a></li>
            <li><a href="https://portal.kendarikota.go.id/">Portal eGovernment Kota Kendari</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-sm-6 sm-margin-40px-bottom">
          <h3 class="footer-title-style1">Kontak Kami</h3>
          <ul class="list-style-1 no-margin">
            <li>
              <span class="d-inline-block vertical-align-top font-size18"><i class="ti-location-pin text-theme-color"></i></span>
              <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">Perpustakaan Kota Kendari</span>
              <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-35px-left">Jl. Drs. H. Abd. Silondae No. 8 , Kel. Mandonga Kec. Mandonga 93111</span>
            </li>
            <li>
              <span class="d-inline-block vertical-align-top font-size18"><i class="ti-mobile text-theme-color"></i></span>
              <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">082187948080</span>
            </li>
            <li>
              <span class="d-inline-block vertical-align-top font-size18"><i class="ti-email text-theme-color"></i></span>
              <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">kurniawan.ilyas@kendarikota.go.id</span>
            </li>
          </ul>
        </div>

        <div class="col-lg-2 statistik col-sm-6 mobile-margin-40px-bottom">
          <h3 class="footer-title-style1">Statistik Pengunjung</h3>
          <ul class="list-style-1 no-margin-bottom">
            <li><span>Hari Ini :</span><span class="value"><?= $pengunjung->jumlah_perhari ?></span></li>
            <li><span>Bulan Ini :</span><span class="value"><?= $pengunjung->jumlah_bulan ?></span></li>
            <li><span>Total Ini :</span><span class="value"><?= $pengunjung->jumlah_keseluruhan ?></span></li>
          </ul>

          <div class="form">
            <p>Apakah pelayanan dokumentasi di Bagian Hukum Setda. Kota Kendari dirasa puas?</p>
            <a target="_blank" href="https://forms.gle/wtEHAoVe7EcZ8AHx6" class="btn btn-primary"><i class="fa-solid fa-square-poll-vertical"></i> &nbsp;Ikuti Survey Kami</a>
          </div>
        </div>



      </div>

    </div>
  </div>

  <div class="footer-bar xs-padding-15px-tb">
    <div class="container">
      <div class="float-right xs-width-100 text-center xs-margin-5px-bottom">
        <ul class="social-icon-style no-margin">
          <li>
            <a class="text-white" href="https://www.facebook.com/profile.php?id=100083031531002&locale=id_ID"><i class="fab fa-facebook-f"></i></a> Kendarikota
          </li>
          <li>
            <a class="text-white" href="https://www.youtube.com/@kendarikotagoid9481"><i class="fab fa-youtube"></i></a> Kendarikota go id
          </li>
          <li>
            <a class="text-white" href="https://www.instagram.com/kendarikota/"><i class="fab fa-instagram"></i></a> kendarikotagoid
          </li>
        </ul>
      </div>
      <div class="float-left xs-width-100 text-center">
        <p class="text-medium-black font-weight-600 margin-5px-top xs-no-margin-top">&copy; 2025 All Rights Reserved by <a class="text-black" href="https://bphn.go.id">BPHN</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- end footer section -->
