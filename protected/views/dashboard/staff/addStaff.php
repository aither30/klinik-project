<?php /* @var $this DashboardController */ /* @var $model User */ ?>
<?php $this->pageTitle = 'Tambah Staff'; ?>

<div class="m-4 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">➕ Tambah Staff</h1>

    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php echo CHtml::beginForm('', 'post', ['class' => 'space-y-6', 'enctype' => 'multipart/form-data']); ?>

    <!-- Username -->
    <div class="mb-4">
        <?php echo CHtml::label('Username', 'username', ['class' => 'block font-medium text-gray-700']); ?>
        <?php echo CHtml::textField('User[username]', $model->username, [
            'class' => 'w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600',
            'required' => true
        ]); ?>
        <?php echo CHtml::error($model, 'username', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Email -->
    <div class="mb-4">
        <?php echo CHtml::label('Email', 'email', ['class' => 'block font-medium text-gray-700']); ?>
        <?php echo CHtml::emailField('User[email]', $model->email, [
            'class' => 'w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600',
            'required' => true
        ]); ?>
        <?php echo CHtml::error($model, 'email', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Password -->
    <div class="mb-4">
        <?php echo CHtml::label('Password', 'password', ['class' => 'block font-medium text-gray-700']); ?>
        <?php echo CHtml::passwordField('User[password]', '', [
            'class' => 'w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600',
            'required' => true
        ]); ?>
        <?php echo CHtml::error($model, 'password', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Role -->
    <div class="mb-4">
        <?php echo CHtml::label('Role', 'role', ['class' => 'block font-medium text-gray-700']); ?>
        <?php echo CHtml::dropDownList('User[role]', $model->role, [
            'admin' => 'Admin',
            'petugas_pendaftaran' => 'Petugas Pendaftaran',
            'dokter' => 'Dokter',
            'kasir' => 'Kasir',
        ], ['class' => 'w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600']); ?>
        <?php echo CHtml::error($model, 'role', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Image -->
    <div class="mb-4">
        <?php echo CHtml::label('Foto Profil', 'image', ['class' => 'block font-medium text-gray-700']); ?>
        <?php echo CHtml::fileField('User[image]', '', [
            'class' => 'w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600'
        ]); ?>
        <?php echo CHtml::error($model, 'image', ['class' => 'text-sm text-red-600 mt-1']); ?>
    </div>

    <!-- Submit -->
    <div class="flex justify-between">
    <div>
            <?php echo CHtml::link('Kembali', ['dashboard/adminDashboard'], [
                'class' => 'bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-3 rounded-md font-semibold'
            ]); ?>
        </div>
        <div>
            <?php echo CHtml::submitButton('Simpan Staff', [
                'class' => 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-md font-semibold'
            ]); ?>
        </div>
        
    </div>

    <?php echo CHtml::endForm(); ?>
</div>
