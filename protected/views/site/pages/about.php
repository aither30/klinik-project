<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - About';
?>

<div class="container mx-auto px-4 my-2">
    <!-- Content -->
    <div class="bg-white shadow-sm p-6 rounded-lg">

        <h1 class="text-3xl font-bold text-blue-700 mb-4">Tentang Klinik Sehat Tasikmalaya</h1>

        <!-- Deskripsi Klinik -->
        <p class="text-lg mb-6">
            Klinik Sehat Tasikmalaya adalah pusat layanan kesehatan yang berdedikasi untuk memberikan perawatan terbaik bagi masyarakat Tasikmalaya dan sekitarnya. Kami menyediakan berbagai layanan medis dengan kualitas terbaik, didukung oleh tenaga medis yang profesional dan fasilitas yang modern.
        </p>

        <!-- Misi dan Visi -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Visi dan Misi</h2>
			<div class="flex gap-6">
			<p class="text-lg mb-4 w-1/2 bg-gray-100 p-6 rounded-lg shadow-lg">
                <strong>Visi:</strong><br>
                Menjadi klinik terpercaya yang memberikan pelayanan kesehatan terbaik dan terjangkau untuk masyarakat, dengan mengutamakan kualitas dan kenyamanan pasien.
            </p>
            <p class="text-lg mb-4 w-1/2 bg-gray-100 p-6 rounded-lg shadow-lg">
                <strong>Misi:</strong><br>
                1. Memberikan pelayanan medis yang berkualitas dan profesional.<br>
                2. Meningkatkan kesadaran kesehatan masyarakat melalui program pencegahan penyakit.<br>
                3. Menyediakan fasilitas yang modern dan nyaman untuk pasien.
            </p>
			</div>
        </div>

        <!-- Tim Dokter -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Tim Dokter Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                    <img src="https://via.placeholder.com/150" alt="Dr. Ahmad" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold">Dr. Ahmad Suryani</h3>
                    <p class="text-gray-600">Spesialis Penyakit Dalam</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                    <img src="https://via.placeholder.com/150" alt="Dr. Rina" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold">Dr. Rina Dewi</h3>
                    <p class="text-gray-600">Spesialis Anak</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                    <img src="https://via.placeholder.com/150" alt="Dr. Budi" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold">Dr. Budi Santoso</h3>
                    <p class="text-gray-600">Spesialis Bedah</p>
                </div>
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Fasilitas Kami</h2>
            <ul class="list-disc pl-6">
                <li class="text-lg mb-2">Ruang periksa yang nyaman dan lengkap</li>
                <li class="text-lg mb-2">Laboratorium dengan peralatan medis canggih</li>
                <li class="text-lg mb-2">Kamar rawat inap yang dilengkapi dengan fasilitas modern</li>
                <li class="text-lg mb-2">Apotek dengan obat-obatan yang lengkap dan terpercaya</li>
                <li class="text-lg mb-2">Layanan darurat 24 jam</li>
            </ul>
        </div>

        <!-- Galeri -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Galeri Klinik</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="w-full h-64 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/300" alt="Klinik 1" class="w-full h-full object-cover">
                </div>
                <div class="w-full h-64 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/300" alt="Klinik 2" class="w-full h-full object-cover">
                </div>
                <div class="w-full h-64 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/300" alt="Klinik 3" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</div>
