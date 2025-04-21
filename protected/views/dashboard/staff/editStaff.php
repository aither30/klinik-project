<?php
/* @var $users User */
?>

<div class="m-4 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg shadow-xl ">
    <h1 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-2">Edit Data Pengguna</h1>

    <?php $form = $this->beginWidget('CActiveForm', [
        'id' => 'edit-user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?php echo CHtml::hiddenField('User[id]', $users->id); ?>

    <!-- Username -->
    <div class="mb-4">
        <?php echo $form->labelEx($users, 'username', ['class' => 'block text-gray-700 font-semibold mb-1']); ?>
        <?php echo $form->textField($users, 'username', ['class' => 'border border-gray-300 rounded p-2 w-full']); ?>
        <?php echo $form->error($users, 'username', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Role -->
    <div class="mb-4">
        <?php echo $form->labelEx($users, 'role', ['class' => 'block text-gray-700 font-semibold mb-1']); ?>
        <?php echo $form->dropDownList($users, 'role', [
            'admin' => 'Admin',
            'petugas_pendaftaran' => 'Petugas Pendaftaran',
            'dokter' => 'Dokter',
            'kasir' => 'Kasir',
            'staff' => 'Staff',
        ], ['class' => 'border border-gray-300 rounded p-2 w-full']); ?>
        <?php echo $form->error($users, 'role', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Email -->
    <div class="mb-4">
        <?php echo $form->labelEx($users, 'email', ['class' => 'block text-gray-700 font-semibold mb-1']); ?>
        <?php echo $form->textField($users, 'email', ['class' => 'border border-gray-300 rounded p-2 w-full']); ?>
        <?php echo $form->error($users, 'email', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Gambar -->
    <div class="mb-4">
        <?php echo $form->labelEx($users, 'image', ['class' => 'block text-gray-700 font-semibold mb-1']); ?>
        <?php echo $form->fileField($users, 'image', ['class' => 'border border-gray-300 rounded p-2 w-full']); ?>
        <?php echo $form->error($users, 'image', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Aksi -->
    <div class="flex justify-between mt-6">
        <a href="<?php echo Yii::app()->createUrl('dashboard/adminDashboard'); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
            ← Kembali
        </a>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
            💾 Simpan
        </button>
    </div>

    <?php $this->endWidget(); ?>
</div>
