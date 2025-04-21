<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array('Register');
?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
  <?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>

    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Buat Akun Baru</h2>

    <?php $form = $this->beginWidget('CActiveForm', array(
      'id' => 'register-form',
      'enableClientValidation' => true,
      'clientOptions' => array('validateOnSubmit' => true),
    )); ?>

    <div class="mb-4">
      <?php echo $form->labelEx($model, 'username', array('class' => 'block text-gray-700 mb-1')); ?>
      <?php echo $form->textField($model, 'username', array(
        'class' => 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'
      )); ?>
      <?php echo $form->error($model, 'username', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-4">
      <?php echo $form->labelEx($model, 'password', array('class' => 'block text-gray-700 mb-1')); ?>
      <?php echo $form->passwordField($model, 'password', array(
        'class' => 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'
      )); ?>
      <?php echo $form->error($model, 'password', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-4">
      <?php echo $form->labelEx($model, 'role', array('class' => 'block text-gray-700 mb-1')); ?>
      <?php echo $form->dropDownList($model, 'role', array(
        'admin' => 'Admin',
        'dokter' => 'Dokter',
        'petugas' => 'Petugas',
        'kasir' => 'Kasir',
      ), array(
        'prompt' => '- Pilih Role -',
        'class' => 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'
      )); ?>
      <?php echo $form->error($model, 'role', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-6">
      <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">
        Register
      </button>
    </div>

    <div class="text-center text-sm text-gray-600">
      Sudah punya akun?
      <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="text-blue-500 hover:underline">Login</a>
    </div>

    <?php $this->endWidget(); ?>
  </div>
</div>
