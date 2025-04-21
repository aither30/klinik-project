<?php
/* @var $this DashboardController */
/* @var $treatments Treatment[] */

$this->pageTitle = 'Manage Treatment';
?>

<div class="p-6">
    <!-- Heading dengan Icon -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-stethoscope text-blue-600 text-2xl"></i>
            <h3 class="text-2xl font-semibold text-gray-800">Manage Treatment</h3>
        </div>
        <!-- Tambahkan tombol tambah data jika dibutuhkan -->
        <!-- <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition">
            ➕ Add Treatment
        </a> -->
    </div>

    <!-- Table Treatment -->
    <?php if (count($treatments) > 0): ?>
        <table class="min-w-full table-auto bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Patient Name</th>
                    <th class="px-6 py-3 text-left">Treatment</th>
                    <th class="px-6 py-3 text-left">Medicine</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php foreach($treatments as $t): ?>
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-6 py-4"><?php echo $t->id; ?></td>
                        <td class="px-6 py-4"><?php echo CHtml::encode($t->patient_name); ?></td>
                        <td class="px-6 py-4"><?php echo CHtml::encode($t->tindakan); ?></td>
                        <td class="px-6 py-4"><?php echo CHtml::encode($t->obat); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-gray-600 mt-4">No treatment records found.</p>
    <?php endif; ?>
</div>
