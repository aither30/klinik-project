<?php
/* @var $this DashboardController */
/* @var $users User[] */

$this->pageTitle = 'Manage Staff';
?>

<div class="flex justify-between items-center w-full mb-6">
    <h1 class="text-2xl font-bold text-gray-800">👩‍⚕️ Manage Staff</h1>
    <a href="<?php echo Yii::app()->createUrl('dashboard/addStaff'); ?>"
        class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition duration-200 ease-in-out">
        ➕ Tambah Staff
    </a>
</div>





<div class="w-full bg-white shadow-lg rounded-lg ">
    <div class="overflow-x-auto">
        <table class="min-w-full  rounded-lg  overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-5 text-left text-sm font-semibold uppercase tracking-wider">Image</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold uppercase tracking-wider">Username</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold uppercase tracking-wider">Email</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold uppercase tracking-wider">Role</th>
                    <th class="py-3 px-5 text-center text-sm font-semibold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach ($users as $user): ?>
                    <div id="delete-popup-<?php echo $user->id; ?>" class="hidden absolute top-1/2 left-[calc(50%)] z-50 ">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                            <h2 class="text-xl font-bold mb-4">Konfirmasi Penghapusan</h2>
                            <p>Apakah Anda yakin ingin menghapus staff ini?</p>
                            <div class="mt-4 flex justify-end">
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md mr-2"
                                    onclick="closeDeleteConfirmation('<?php echo $user->id; ?>')">
                                    Batal
                                </button>
                                <a href="<?php echo Yii::app()->createUrl('dashboard/hapusStaff', ['id' => $user->id]); ?>"
                                    id="confirm-delete-<?php echo $user->id; ?>"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-5 text-center">
                            <?php if (!empty($user->image)): ?>
                                <img src="<?php echo Yii::app()->baseUrl . '/uploads/' . CHtml::encode($user->image); ?>" alt="User Image" class="w-12 h-12 object-cover rounded-full mx-auto">
                            <?php else: ?>
                                <span class="text-gray-500">Tidak ada foto profil</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-5"><?php echo CHtml::encode($user->username); ?></td>
                        <td class="py-3 px-5"><?php echo CHtml::encode($user->email); ?></td>
                        <td class="py-3 px-5">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                <?php echo $user->role === 'admin' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'; ?>">
                                <?php echo CHtml::encode(ucfirst($user->role)); ?>
                            </span>
                        </td>
                        <td class="py-3 px-5 text-center">
                            <a href="<?php echo Yii::app()->createUrl('dashboard/editStaff', ['id' => $user->id]); ?>"
                                class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm transition">
                                ✏️ Edit
                            </a>
                            <button class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm transition"
                                data-id="<?php echo $user->id; ?>" onclick="openDeleteConfirmation(this)">
                                <i class="fa fa-trash"></i> Hapus
                            </button>




                        </td>

                    </tr>


                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>