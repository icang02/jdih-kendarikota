<?php

use yii\widgets\Menu;
?>


<?php
$jenis_info = \frontend\models\JenisInformasiHukum::find()
  ->orderBy(['created_at' => SORT_DESC])
  //->offset(1)
  ->all();

$jenis = [];
if ($jenis_info) {
  foreach ($jenis_info as $key) {
    $jenis[] = ['label' => $key->singkatan, 'url' => ["informasi-hukum/index/$key->id"]];
  }
}

$menuItems = [
  [
    'label' => 'Beranda',
    'url' => Yii::$app->request->hostInfo,
  ],

  [
    'label'    => 'Profil',
    'url'      => '#',
    'options'  => ['class' => 'has-sub'],
    'template' => '<span class="submenu-button"></span><a href="javascript:void(0)" class="href_class">{label}</a>',
    'items'    => [
      ['label' => 'Sekilas Sejarah', 'url' => ['site/sekilas-sejarah']],
      ['label' => 'Dasar Hukum', 'url' => ['site/dasar-hukum']],
      ['label' => 'Visi ', 'url' => ['site/visi']],
      ['label' => 'Misi', 'url' => ['site/misi']],
      ['label' => 'Struktur Organisasi', 'url' => ['site/sto']],
    ]
  ],

  [
    'label'          => 'Jenis Dokumen',
    'url'            => '#',
    'options'        => ['class' => 'has-sub'],
    'activateItems'  => true,
    'activeCssClass' => 'active',
    'template'       => '<span class="submenu-button"></span><a href={url}>{label}</a>',
    'items' => [
      ['label' => 'Peraturan dan Keputusan', 'url' => ['dokumen/peraturan']],
      ['label' => 'Monografi', 'url' => ['dokumen/monografi']],
      ['label' => 'Artikel/Majalah Hukum', 'url' => ['dokumen/artikel']],
      ['label' => 'Putusan', 'url' => ['dokumen/putusan']],
    ]
  ],
  ['label' => 'Pengumuman', 'url' => ['pengumuman/index']],
  [
    'label'          => 'Informasi Hukum',
    'url'            => '#',
    'options'        => ['class' => 'has-sub'],
    'activateItems'  => true,
    'activeCssClass' => 'active',
    'template' => '<span class="submenu-button"></span><a href={url}>{label}</a>',
    'items'    => $jenis
  ],
  ['label' => 'Berita', 'url' => ['berita/index']],
];

if (Yii::$app->user->isGuest) {
  //
} else {
  $menuItems[] = ['label' => 'Profile User', 'url' => ['/profile/index']];
  $menuItems[] = ['label' => 'Sign out', 'url' => ['/site/logout'],  ['data' => ['method' => 'post']]];
}

echo Menu::widget([
  'items' => $menuItems,
  'options' => [
    'class' => 'navbar-nav ml-left',
    'id'    => 'nav',
  ],
  'activateParents' => true,
  'activeCssClass' => 'current',
]);
?>
