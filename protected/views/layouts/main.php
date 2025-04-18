<?php
/** @var Controller $this */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUndefinedMethodInspection */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/styles.css">
    <!-- <link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/tailwind.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<!-- Tambahkan flex-col di body -->
<body class="flex flex-col min-h-screen max-w-[100vw] text-gray-900 bg-gradient-to-r from-gray-100 to-gray-200 overflow-x-hidden" >

    <!-- Page harus bisa tumbuh agar dorong footer ke bawah -->
    <div id="page" class="flex-grow h-full">

<!-- Navbar -->
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
    <button @click="open = !open" class="text-white hover:text-gray-300 focus:outline-none">
      <?php echo Yii::app()->user->name; ?> ▾
    </button>

    <div
      x-show="open"
      @click.away="open = false"
      x-transition
      class="absolute right-0 mt-2 w-44 bg-blue-500 text-gray-800 rounded-md shadow-xl z-50"
    >
      <a href="<?php echo Yii::app()->createUrl('/site/profile'); ?>" class="block px-4 py-2 text-white hover:font-semibold">
        Profile
      </a>
      <a href="<?php echo Yii::app()->createUrl('/site/adminDashboard'); ?>" class="block px-4 py-2 text-white hover:font-semibold">
        Dashboard
      </a>
      <a href="<?php echo Yii::app()->createUrl('/site/changePassword'); ?>" class="block px-4 py-2 text-white hover:font-semibold">
        Ganti Password
      </a>
      <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" class="block px-4 py-2  text-white bg-red-600 rounded-b-md  hover:font-semibold">
        Logout
      </a>
    </div>
  </div>
<?php endif; ?>


    </div>
  </div>
</nav>


<div id="menu" class="hidden flex-col h-full w-1/2 py-10 px-6 space-y-6 text-white font-semibold fixed right-0 top-0 bg-blue-500 z-10">
  <!-- Tombol close -->
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
        <!-- Main Content -->
        <?php echo $content; ?>
    </div><!-- page -->

    <!-- Footer sekarang DI LUAR div#page -->
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
        // menu.classList.add('border-t');
    } else {
        menu.classList.remove('flex');
        menu.classList.add('hidden');
    }
}

</script>

</body>

</html>
