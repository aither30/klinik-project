<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Manajemen Pasien';
$this->breadcrumbs = array('Manajemen Pasien');
?>

<div class="p-6">
  <h2 class="text-3xl font-bold text-gray-800">Manajemen Pasien</h2>
  <p class="text-lg text-gray-600 mb-6">Kelola data pasien klinik Anda di sini.</p>

  <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead>
      <tr>
        <th class="px-4 py-2 text-left text-gray-700">Username</th>
        <th class="px-4 py-2 text-left text-gray-700">Role</th>
        <th class="px-4 py-2 text-left text-gray-700">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($patients as $patient): ?>
      <tr>
        <td class="px-4 py-2"><?php echo CHtml::encode($patient['username']); ?></td>
        <td class="px-4 py-2"><?php echo CHtml::encode($patient['role']); ?></td>
        <td class="px-4 py-2">
          <a href="<?php echo Yii::app()->createUrl('site/editPatient', array('id' => $patient['id'])); ?>" class="text-blue-500 hover:underline">Edit</a>
          <a href="<?php echo Yii::app()->createUrl('site/deletePatient', array('id' => $patient['id'])); ?>" class="text-red-500 hover:underline ml-4">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="<?php echo Yii::app()->createUrl('site/addPatient'); ?>" class="mt-6 inline-block bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">Tambah Pasien</a>
</div>
