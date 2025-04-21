<?php



$this->pageTitle = 'Detail Pasien';
?>

<div class="m-4 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg shadow-xl">

    <h1 class="text-3xl font-bold text-gray-900 mb-6">Detail Pasien</h1>

    <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200 mb-6">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-800">
            <div>
                <dt class="font-semibold text-blue-600">Nama:</dt>
                <dd class="text-lg"><?php echo CHtml::encode($patient->name); ?></dd>
            </div>
            <div>
                <dt class="font-semibold text-blue-600">Email:</dt>
                <dd class="text-lg"><?php echo CHtml::encode($patient->email); ?></dd>
            </div>
            <div>
                <dt class="font-semibold text-blue-600">Alamat:</dt>
                <dd class="text-lg"><?php echo CHtml::encode($patient->address); ?></dd>
            </div>
            <div>
                <dt class="font-semibold text-blue-600">Telepon:</dt>
                <dd class="text-lg"><?php echo CHtml::encode($patient->phone); ?></dd>
            </div>
            <div>
                <dt class="font-semibold text-blue-600">Usia:</dt>
                <dd class="text-lg"><?php echo CHtml::encode($patient->age); ?></dd>
            </div>
            <div>
                <dt class="font-semibold text-blue-600">Gender:</dt>
                <dd class="text-lg"><?php echo ($patient->gender == 'M') ? 'Laki-laki' : 'Perempuan'; ?></dd>
            </div>
        </dl>
    </div>

    <div>
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Riwayat Kunjungan</h2>

        <?php if (!empty($patient->visits)): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-50 text-gray-700 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-2 text-left border-b text-blue-600">Tanggal</th>
                            <th class="px-4 py-2 text-left border-b text-blue-600">Tujuan</th>
                            <th class="px-4 py-2 text-left border-b text-blue-600">Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patient->visits as $visit): ?>
                            <tr>
                                <td class="px-4 py-2 border-b"><?php echo date('d M Y, H:i', strtotime($visit->visit_date)); ?></td>
                                <td class="px-4 py-2 border-b"><?php echo CHtml::encode($visit->purpose); ?></td>
                                <td class="px-4 py-2 border-b">
                                    <?php
                                    if ($visit->doctor && $visit->doctor->role === 'dokter') {
                                        echo CHtml::encode($visit->doctor->username);
                                    } else {
                                        echo '<span class="text-red-500 italic">Tidak tersedia</span>';
                                    }
                                    ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-500 italic mt-4">Belum ada kunjungan tercatat.</p>
        <?php endif; ?>
    </div>

    <div class="pt-4">
        <a href="<?php echo Yii::app()->createUrl('dashboard/adminDashboard'); ?>"
            class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-xl shadow-md">
            ← Kembali ke daftar
        </a>
    </div>

</div>