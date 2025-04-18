<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<div class="bg-gray-50 flex flex-col justify-center">

  <!-- Hero Section -->
  <section class="flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-20 py-16 bg-white shadow-inner">
    <div class="max-w-xl text-center md:text-left">
      <h1 class="text-4xl md:text-5xl font-extrabold text-blue-600 leading-tight">
        Selamat Datang di 
      </h1>
      <h1>
        <span class="text-4xl md:text-5xl font-extrabold text-gray-800">Sistem Informasi Klinik</span>
      </h1>
      <p class="text-gray-600 mt-4 text-lg">
        Kendalikan data pegawai, pasien, dan layanan medis dalam satu sistem klinik yang efisien dan mudah digunakan.
      </p>
      <div class="mt-6 flex justify-center md:justify-start space-x-4">
        <?php if (Yii::app()->user->isGuest): ?>
          <a href="<?= Yii::app()->createUrl('/site/login') ?>" class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
            Login
          </a>
        <?php else: ?>
          <a href="<?= Yii::app()->createUrl('/dashboard') ?>" class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
            Ke Dashboard
          </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="mb-8 md:mb-0 md:ml-10">
      <img src="https://cdn-icons-png.flaticon.com/512/5997/5997689.png" alt="Klinik" class="w-72 md:w-96">
    </div>
  </section>

 <!-- Fitur Utama -->
<section class="py-14 px-6 md:px-20 bg-blue-50">
  <h2 class="text-center text-3xl font-bold text-blue-600 mb-10">Fitur Unggulan</h2>
  <div class="grid gap-8 grid-cols-1 md:grid-cols-3">

    <!-- Data Master -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <svg class="h-12 w-12 mx-auto text-blue-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path d="M3 5h18v14H3z" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M3 7h18M7 5v14" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Manajemen Data Master</h3>
      <p class="text-gray-600 text-center">Kelola data wilayah, pegawai, user, tindakan medis, dan obat dengan mudah.</p>
    </div>

    <!-- Pendaftaran -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <svg class="h-12 w-12 mx-auto text-green-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 2c-2.667 0-8 1.334-8 4v1h16v-1c0-2.666-5.333-4-8-4zM20 8h-2m1-1v2" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Pendaftaran Pasien</h3>
      <p class="text-gray-600 text-center">Daftarkan pasien baru dengan riwayat kunjungan dan jenis layanan.</p>
    </div>

    <!-- Tindakan & Resep -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <svg class="h-12 w-12 mx-auto text-purple-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3a.75.75 0 00-.75.75v1.5H6.75A.75.75 0 006 6v12a.75.75 0 00.75.75h10.5A.75.75 0 0018 18V6a.75.75 0 00-.75-.75h-2.25v-1.5a.75.75 0 00-.75-.75h-4.5zM9 9h6m-6 3h3" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Tindakan & Resep</h3>
      <p class="text-gray-600 text-center">Catat tindakan medis dan resep obat dengan cepat dan aman.</p>
    </div>

    <!-- Pembayaran -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <svg class="h-12 w-12 mx-auto text-yellow-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 10h18M5 14h4m4 0h4" />
        <rect x="3" y="5" width="18" height="14" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Pembayaran Tagihan</h3>
      <p class="text-gray-600 text-center">Hitung total biaya dari tindakan dan resep, langsung dari sistem.</p>
    </div>

    <!-- Laporan -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <svg class="h-12 w-12 mx-auto text-indigo-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14a2 2 0 012 2v14l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Laporan Klinik</h3>
      <p class="text-gray-600 text-center">Lihat laporan bulanan tindakan, resep, dan statistik kunjungan.</p>
    </div>

  </div>
</section>


  <!-- CTA Section -->
  <section class="bg-white py-14 px-6 md:px-20 text-center">
    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Siap memulai?</h3>
    <p class="text-gray-600 mb-6">Masuk sekarang dan nikmati kemudahan mengelola klinik Anda.</p>
    <?php if (Yii::app()->user->isGuest): ?>
      <a href="<?= Yii::app()->createUrl('/site/login') ?>" class="px-8 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
        Login
      </a>
    <?php else: ?>
      <a href="<?= Yii::app()->createUrl('/dashboard') ?>" class="px-8 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
        Ke Dashboard
      </a>
    <?php endif; ?>
  </section>
</div>
