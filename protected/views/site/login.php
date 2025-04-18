<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="flex justify-center py-10 px-4 sm:px-6 lg:px-8 ">
    <div class=" flex justify-center space-y-8 bg-blue-500 text-white rounded-2xl">
    <div class="hidden lg:flex flex-col justify-center lg:w-1/2 p-10">
  <h2 class="text-4xl font-extrabold text-white mb-8 leading-tight tracking-tight">Masuk & Nikmati Fitur Premium</h2>

  <div class="space-y-6">
    <!-- Card 1 -->
    <div class="flex items-start space-x-4">
      <div class="p-3 bg-blue-800 text-white rounded-full shadow-md">
        <!-- Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 17h5l-1.405-1.405M4 6h16M4 12h16m-7 6h7m-4-4v6m0 0H6m6 0v-6"></path>
        </svg>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-white">Akses Cepat & Aman</h3>
        <p class="text-sm text-blue-100">Login instan dengan keamanan maksimal dan pengalaman tanpa hambatan.</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="flex items-start space-x-4">
      <div class="p-3 bg-green-500 text-white rounded-full shadow-md">
        <!-- Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"></path>
        </svg>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-white">Fitur Eksklusif</h3>
        <p class="text-sm text-blue-100">Unlock fitur-fitur premium yang hanya tersedia bagi member terdaftar.</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="flex items-start space-x-4">
      <div class="p-3 bg-purple-500 text-white rounded-full shadow-md">
        <!-- Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 9V7a4 4 0 00-8 0v2M5 13h14M12 17h.01"></path>
        </svg>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-white">Privasi Terjamin</h3>
        <p class="text-sm text-blue-100">Data Anda aman bersama kami – tanpa kompromi.</p>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="flex items-start space-x-4">
      <div class="p-3 bg-yellow-500 text-white rounded-full shadow-md">
        <!-- Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2z"></path>
        </svg>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-white">Progress Tersimpan</h3>
        <p class="text-sm text-blue-100">Pantau kemajuan dan aktivitas Anda secara real-time.</p>
      </div>
    </div>
  </div>
</div>



    <!-- Bagian Kanan: Form Login -->
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-6">Login</h2>

        <p class="text-center text-gray-600 mb-6">Please fill out the form below to access your account.</p>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>

        <div class="mb-4">
            <?php echo $form->labelEx($model, 'username', array('class' => 'block text-lg font-medium text-gray-700')); ?>
            <?php echo $form->textField($model, 'username', array('class' => 'mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105')); ?>
            <?php echo $form->error($model, 'username', array('class' => 'text-red-600 text-sm mt-1')); ?>
        </div>

        <div class="mb-4">
            <?php echo $form->labelEx($model, 'password', array('class' => 'block text-lg font-medium text-gray-700')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105')); ?>
            <?php echo $form->error($model, 'password', array('class' => 'text-red-600 text-sm mt-1')); ?>
            <p class="text-sm text-gray-500 mt-2">
                Hint: You may login with <kbd class="bg-gray-200 p-1 rounded">demo</kbd>/<kbd class="bg-gray-200 p-1 rounded">demo</kbd> or <kbd class="bg-gray-200 p-1 rounded">admin</kbd>/<kbd class="bg-gray-200 p-1 rounded">admin</kbd>.
            </p>
        </div>

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'h-4 w-4 text-blue-500')); ?>
                <?php echo $form->label($model, 'rememberMe', array('class' => 'ml-2 text-md text-gray-700')); ?>
            </div>
            <a href="#" class="text-sm text-blue-500 hover:text-blue-600">Forgot password?</a>
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105">
                Login
            </button>
        </div>

        <!-- Tombol Register -->
        <div class="text-center">
            <p class="text-sm text-gray-700">Don't have an account? 
                <a href="<?= Yii::app()->createUrl('/site/register') ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                    Register here
                </a>
            </p>
        </div>

        <?php $this->endWidget(); ?>

    </div>
    </div>
</div>
