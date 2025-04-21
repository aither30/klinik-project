<?php



$this->pageTitle = 'Kelola Pasien';
?>

<div class="flex justify-between items-center mb-6">
    <div class="flex items-center space-x-3">
        <i class="fa-solid fa-user-injured text-blue-600 text-2xl"></i>
        <h3 class="text-2xl font-bold text-gray-800">Kelola Data Pasien</h3>
    </div>
    <a href="<?php echo Yii::app()->createUrl('dashboard/addPatient'); ?>"
        class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-xl transition">
        ➕ Tambah Pasien Baru
    </a>
</div>

<?php if (count($patients) > 0): ?>
    <div class="overflow-x-auto rounded-lg shadow-lg">
        <table class="min-w-full bg-white rounded-lg shadow-sm border-collapse">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">Usia</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">Jenis Kelamin</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">Wilayah</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold uppercase">Riwayat Kunjungan Terakhir</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php foreach ($patients as $index => $patient): ?>
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-4 py-4"><?php echo CHtml::encode($patient->id); ?></td>
                        <td class="px-4 py-4"><?php echo CHtml::encode($patient->name); ?></td>
                        <td class="px-4 py-4"><?php echo CHtml::encode($patient->age); ?> tahun</td>
                        <td class="px-4 py-4">
                            <?php
                            echo CHtml::encode(
                                $patient->gender == 'M' ? 'Laki-laki' : ($patient->gender == 'F' ? 'Perempuan' : 'Tidak Diketahui')
                            );
                            ?>
                        </td>
                        <td class="px-4 py-4">
                            <?php

                            echo CHtml::encode($patient->kabupaten ? $patient->kabupaten->nama_kabupaten : 'Tidak Diketahui');
                            ?>
                        </td>

                        <td class="px-4 py-4">
                            <?php

                            $anyVisit = Visit::model()->find(
                                array(
                                    'condition' => 'patient_id = :patientId',
                                    'params' => array(':patientId' => $patient->id),
                                )
                            );

                            if ($anyVisit) {
                                echo date('d M Y', strtotime($anyVisit->visit_date));
                            } else {
                                echo '<span class="text-gray-500">Belum ada kunjungan</span>';
                            }
                            ?>



                        </td>
                        <td class="px-4 py-4 text-center space-y-3 flex flex-col">
                            <div class="flex space-x-2 justify-center">
                                <a href="<?php echo Yii::app()->createUrl('dashboard/updatePatient', ['id' => $patient->id]); ?>"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md shadow-md text-xs">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md shadow-md text-xs"
                                    onclick="openDeleteModal('<?php echo $patient->id; ?>')">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                                <a href="<?php echo Yii::app()->createUrl('dashboard/showPatient', ['id' => $patient->id]); ?>"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md shadow-md text-xs">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            <a href="<?php echo Yii::app()->createUrl('dashboard/addVisit', ['patientId' => $patient->id]); ?>"
                                class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md shadow-md mt-2 text-xs">
                                Tambah Kunjungan
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p class="text-gray-600 mt-4">Belum ada data pasien. Silakan tambahkan pasien baru melalui tombol di atas.</p>
<?php endif; ?>

<div id="deleteModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-xl font-semibold">Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin menghapus pasien ini?</p>
        <div class="mt-4">
            <button onclick="closeDeleteModal()" class="ml-4 bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Batal</button>
            <a href="" id="deleteButton" class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus</a>
        </div>
    </div>
</div>