<?php
/* @var $this SiteController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - Admin Dashboard';
?>



<!-- Aside untuk menampilkan profil pengguna dan bagian manajemen -->
<div id="adminAside" class="hidden absolute top-0 left-0 w-1/3 bg-blue-500 shadow-lg pl-6  gap-4 h-full transform translate-x-full transition-transform duration-300 justify-center items-center z-50 border">
    <div>


    <div class="bg-white p-2 rounded-2xl ">
        <!-- Admin Profile -->
<div class="bg-white shadow-md rounded-2xl p-4 border border-blue-200">
    <h2 class="text-2xl font-bold text-blue-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.73 6.879 1.976M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Admin Profile
    </h2>
    <div class="mt-4 space-y-2 text-gray-700 text-sm">
        <p><strong>Username:</strong> <?php echo CHtml::encode($model->username); ?></p>
        <p><strong>Email:</strong> <?php echo CHtml::encode($model->email); ?></p>
        <p><strong>Role:</strong> <?php echo CHtml::encode($model->role); ?></p>
        <p><strong>Last Login:</strong> <?php echo CHtml::encode($model->last_login); ?></p>
    </div>
</div>

<!-- Management & Quick Actions -->
<div class="bg-white shadow-md rounded-2xl p-4 mt-2 border border-gray-200 ">
    <h3 class="text-xl font-bold text-gray-800 mb-2 border-b boder-blue-500">Manage Clinic</h3>
    <ul class="space-y-4 text-gray-600 text-sm">
        <li><a href="<?php echo Yii::app()->createUrl('user/manage'); ?>" class="hover:text-blue-600 hover:pl-2 transition-all duration-200">🔑 Manage Users (Akun)</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('patient/manage'); ?>" class="hover:text-blue-600 hover:pl-2 transition-all duration-200">🧑‍⚕️ Manage Patients</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('treatment/manage'); ?>" class="hover:text-blue-600 hover:pl-2 transition-all duration-200">💊 Manage Treatments</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('payment/manage'); ?>" class="hover:text-blue-600 hover:pl-2 transition-all duration-200">💳 Manage Payments</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('staff/manage'); ?>" class="hover:text-blue-600 hover:pl-2 transition-all duration-200">👩‍⚕️ Manage Staff</a></li>
    </ul>

    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Quick Actions</h3>
    <ul class="space-y-4 text-gray-600 text-sm">
        <li><a href="<?php echo Yii::app()->createUrl('patient/create'); ?>" class="hover:text-green-600 hover:pl-2 transition-all duration-200">➕ Add New Patient</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('treatment/create'); ?>" class="hover:text-green-600 hover:pl-2 transition-all duration-200">➕ Add New Treatment</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('payment/create'); ?>" class="hover:text-green-600 hover:pl-2 transition-all duration-200">💰 Process Payment</a></li>
    </ul>
</div>
    </div>

    </div>
    <div onclick="btnAside()" class="cursor-pointer py-2 pl-3 bg-blue-500 text-white rounded-l-full">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
</div>



</div>

<div class="fixed top-0 left-0 h-full bg-gray-500 flex justify-center items-center">
<div onclick="btnAside()" class="cursor-pointer py-2 pl-3 h-10 bg-blue-500 text-white rounded-r-full ">
        <!-- Ikon panah kanan -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
</div>
</div>

<div class="h-full flex justify-center items-center w-full p-10">
    <!-- Dashboard Header -->
    <div class="h-full flex flex-col w-full m-10 bg-white p-6 rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800">Welcome, Admin</h2>
        <div class="mt-4">
            <h3 class="text-xl font-medium text-gray-700">Profile Information</h3>
            <p class="text-gray-600"><strong>Username:</strong> <?php echo CHtml::encode($model->username); ?></p>
            <p class="text-gray-600"><strong>Email:</strong> <?php echo CHtml::encode($model->email); ?></p>
            <p class="text-gray-600"><strong>Role:</strong> <?php echo CHtml::encode($model->role); ?></p>
            <p class="text-gray-600"><strong>Last Login:</strong> <?php echo CHtml::encode($model->last_login); ?></p>
        </div>
    </div>
</div>


<!-- JavaScript untuk membuka dan menutup aside -->
<script>

function btnAside() {
    
    const adminAside = document.getElementById('adminAside');
    
    if (adminAside.classList.contains('hidden')) {
        adminAside.classList.remove('hidden');
        adminAside.classList.add('flex');
        // menu.classList.add('border-t');
    } else {
        adminAside.classList.remove('flex');
        adminAside.classList.add('hidden');
    }
}

</script>
