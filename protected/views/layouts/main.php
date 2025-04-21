<?php
/** @var Controller $this */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUndefinedMethodInspection */
$user = User::model()->findByPk(Yii::app()->user->id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/styles.css">
    <!-- <link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/tailwind.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body class="flex flex-col min-h-screen max-w-screen text-gray-900 bg-gradient-to-r from-gray-100 to-gray-200 overflow-x-hidden" >
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success fixed top-5 right-5 bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center space-x-3 transform transition-all duration-300 ease-in-out scale-100 opacity-100 z-50" id="success-alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <div>
            <strong>Berhasil!</strong>
            <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
        </div>
        <button onclick="closeAlert('success-alert')" class="ml-3 text-white focus:outline-none hover:text-gray-200">
            <i class="fa fa-times"></i>
        </button>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="alert alert-error fixed top-5 right-5 bg-red-500 text-white rounded-lg shadow-lg p-4 flex items-center space-x-3 transform transition-all duration-300 ease-in-out scale-100 opacity-100" id="error-alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <div>
            <strong>Gagal!</strong>
            <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
        </div>
        <button onclick="closeAlert('error-alert')" class="ml-3 text-white focus:outline-none hover:text-gray-200">
            <i class="fa fa-times"></i>
        </button>
    </div>
<?php endif; ?>

<script>
    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        alert.classList.add('opacity-0'); 
        setTimeout(function() {
            alert.classList.add('hidden');
        }, 300);
    }
    
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        
        if (successAlert) {
            successAlert.classList.add('opacity-0');
            setTimeout(function() {
                successAlert.classList.add('hidden');
            }, 300);
        }
        
        if (errorAlert) {
            errorAlert.classList.add('opacity-0');
            setTimeout(function() {
                errorAlert.classList.add('hidden');
            }, 300);
        }
    }, 5000);
</script>

    <div id="page" class="flex flex-col h-full flex-grow">

<nav class="bg-blue-500 p-4 shadow-md">
  <div class="flex justify-between items-center px-10">
    <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="text-white text-3xl font-bold">
      <?php echo CHtml::encode(Yii::app()->name); ?>
    </a>
    <div class="flex items-center lg:hidden">
      <button class="text-white focus:outline-none" onclick="toggleMenu()">
        <span class="text-3xl">☰</span>
      </button>
    </div>
    <div class="hidden lg:flex space-x-6 font-semibold">
      <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="text-white hover:text-gray-300">Home</a>
      <a href="<?php echo Yii::app()->createUrl('/site/page', ['view' => 'about']); ?>" class="text-white hover:text-gray-300">Tentang Kami</a>
      <a href="<?php echo Yii::app()->createUrl('/site/contact'); ?>" class="text-white hover:text-gray-300">Kontak</a>


      <?php if (Yii::app()->user->isGuest): ?>
  <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="text-white hover:text-gray-300">
    Login
  </a>
  <?php else: ?>
  <div x-data="{ open: false }" class="relative inline-block text-left">
    <button @click="open = !open" class="text-white hover:text-gray-300 focus:outline-none flex items-center">
    <?php if (!empty($user->image)): ?>
    <img src="<?php echo Yii::app()->baseUrl . '/uploads/' . CHtml::encode($user->image); ?>" 
         alt="User Image" class="w-8 h-8 object-cover rounded-full inline-block mr-2">
<?php endif; ?>
<span><?php echo CHtml::encode(Yii::app()->user->name); ?> ▾</span>

    </button>

    <div
      x-show="open"
      @click.away="open = false"
      x-transition
      class="absolute right-0 mt-2 w-44 bg-blue-500 text-gray-800 rounded-md shadow-xl z-50"
    >
      <a href="<?php echo Yii::app()->createUrl('/site/adminDashboard'); ?>" class="block px-4 py-2 text-white hover:font-semibold">
        Dashboard
      </a>
      <a href="<?php echo Yii::app()->createUrl('/dashboard/report'); ?>" class="block px-4 py-2 text-white hover:font-semibold">
        Laporan
      </a>
      <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" class="block px-4 py-2 text-white bg-red-600 rounded-b-md hover:font-semibold">
        Logout
      </a>
    </div>
  </div>
<?php endif; ?>



    </div>
  </div>
</nav>


<div id="menu" class="hidden flex-col h-full w-1/2 py-10 px-6 space-y-6 text-white font-semibold fixed right-0 top-0 bg-blue-500 z-10">
  <button onclick="toggleMenu()" class="absolute
   top-5 right-14 text-white text-2xl font-bold focus:outline-none">
    ✕
  </button>

  <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="hover:text-gray-200 transition-all duration-200 transform hover:translate-x-1">🏠 Home</a>
  <a href="<?php echo Yii::app()->createUrl('/site/page', ['view' => 'about']); ?>" class="hover:text-gray-200 transition-all duration-200 transform hover:translate-x-1">📘 About</a>
  <a href="<?php echo Yii::app()->createUrl('/site/contact'); ?>" class="hover:text-gray-200 transition-all duration-200 transform hover:translate-x-1">✉️ Contact</a>

  <?php if (Yii::app()->user->isGuest): ?>
    <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="hover:text-gray-200 transition-all duration-200 transform hover:translate-x-1">🔐 Login</a>
  <?php else: ?>
    <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" class="hover:text-gray-200 transition-all duration-200 transform hover:translate-x-1">
      🚪 Logout (<?php echo Yii::app()->user->name; ?>)
    </a>
  <?php endif; ?>
</div>
        <?php echo $content; ?>
    </div>

    <footer class="bg-blue-500 text-white p-4">
        <div class="text-center">
            Alpi Darul Hakim - <?php echo Yii::powered(); ?> - 17 April 2025
        </div>
    </footer>
	<script>
   function toggleMenu() {
    
    const menu = document.getElementById('menu');
    
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        menu.classList.add('flex');
    } else {
        menu.classList.remove('flex');
        menu.classList.add('hidden');
    }
}

</script>

</body>

</html>
