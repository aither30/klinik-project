<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
?>

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-blue-700 mb-8">Hubungi Kami</h1>

    <?php if (Yii::app()->user->hasFlash('contact')): ?>
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
    <?php else: ?>
        <div class="flex md:flex-row-reverse flex-col-reverse bg-blue-500 rounded-lg">
            <div class="bg-white p-6 rounded-lg shadow-md w-1/2 ">
                <p class="mb-4 text-gray-600">
                    Kirimkan pertanyaan atau pesan Anda melalui formulir berikut. Kami akan merespons secepatnya.
                </p>

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>

                <p class="text-sm text-gray-500 mb-4">Kolom dengan <span class="text-red-500">*</span> wajib diisi.</p>
                <?php echo $form->errorSummary($model, '<p class="text-red-600">Perbaiki kesalahan berikut:</p>'); ?>

                <div class="mb-4">
                    <?php echo $form->labelEx($model, 'name', ['class' => 'block font-medium text-gray-700']); ?>
                    <?php echo $form->textField($model, 'name', ['class' => 'mt-1 w-full p-2 border rounded-lg']); ?>
                    <?php echo $form->error($model, 'name', ['class' => 'text-red-500 text-sm']); ?>
                </div>

                <div class="mb-4">
                    <?php echo $form->labelEx($model, 'email', ['class' => 'block font-medium text-gray-700']); ?>
                    <?php echo $form->textField($model, 'email', ['class' => 'mt-1 w-full p-2 border rounded-lg']); ?>
                    <?php echo $form->error($model, 'email', ['class' => 'text-red-500 text-sm']); ?>
                </div>

                <div class="mb-4">
                    <?php echo $form->labelEx($model, 'subject', ['class' => 'block font-medium text-gray-700']); ?>
                    <?php echo $form->textField($model, 'subject', ['class' => 'mt-1 w-full p-2 border rounded-lg']); ?>
                    <?php echo $form->error($model, 'subject', ['class' => 'text-red-500 text-sm']); ?>
                </div>

                <div class="mb-4">
                    <?php echo $form->labelEx($model, 'body', ['class' => 'block font-medium text-gray-700']); ?>
                    <?php echo $form->textArea($model, 'body', ['rows' => 6, 'class' => 'mt-1 w-full p-2 border rounded-lg']); ?>
                    <?php echo $form->error($model, 'body', ['class' => 'text-red-500 text-sm']); ?>
                </div>

                <?php if (CCaptcha::checkRequirements()): ?>
                    <div class="mb-4">
                        <?php echo $form->labelEx($model, 'verifyCode', ['class' => 'block font-medium text-gray-700']); ?>
                        <div class="flex items-center space-x-4 mt-1">
                            <?php $this->widget('CCaptcha'); ?>
                            <?php echo $form->textField($model, 'verifyCode', ['class' => 'w-full p-2 border rounded-lg']); ?>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                            Masukkan huruf sesuai gambar di atas. Tidak case-sensitive.
                        </p>
                        <?php echo $form->error($model, 'verifyCode', ['class' => 'text-red-500 text-sm']); ?>
                    </div>
                <?php endif; ?>

                <button type="submit"
                        class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Kirim Pesan
                </button>

                <?php $this->endWidget(); ?>
            </div>

<div class=" p-6 rounded-lg w-full md:w-1/2 font-semibold">
  <h2 class="text-2xl font-semibold text-gray-100 mb-4">Klinik Sehat Tasikmalaya</h2>

  <div class="mb-4 text-gray-200 space-y-2">
    <p>
      <strong>Alamat:</strong><br />
      Jl. KHZ. Mustofa No.88<br />
      Kota Tasikmalaya, Jawa Barat 46115
    </p>

    <p>
      <strong>Email:</strong><br />
      <a href="mailto:info@kliniksehat-tasik.id" class="text-green-300 hover:underline">
        info@kliniksehat-tasik.id
      </a>
    </p>

    <p>
      <strong>Telepon:</strong><br />
      <a href="tel:+62265123456" class="text-gray-200 hover:underline">
        (0265) 123-456
      </a><br />
      <a href="https://wa.me/6282100009999" target="_blank"
        class="text-green-400 hover:underline">
        WhatsApp: 0821-0000-9999
      </a>
    </p>

    <p>
      <strong>Jam Operasional:</strong><br />
      Senin - Jumat: 08.00 - 20.00<br />
      Sabtu: 08.00 - 15.00<br />
      Minggu & Libur Nasional: Tutup
    </p>

    <p>
      <strong>Kontak Darurat:</strong><br />
      <span class="text-red-600 font-semibold">0811-123-456 (24 Jam)</span>
    </p>
  </div>

  <div class="mb-6">
    <h3 class="text-lg font-medium text-gray-100 mb-2">Temukan Kami:</h3>
    <div class="flex items-center space-x-4">
      <a href="https://www.facebook.com/kliniksehat" target="_blank" class="hover:scale-105 transition">
        <img src="https://cdn-icons-png.flaticon.com/24/733/733547.png" alt="Facebook" />
      </a>
      <a href="https://www.instagram.com/kliniksehat" target="_blank" class="hover:scale-105 transition">
        <img src="https://cdn-icons-png.flaticon.com/24/2111/2111463.png" alt="Instagram" />
      </a>
      <a href="https://goo.gl/maps/abcd1234" target="_blank" class="hover:underline text-gray-100 text-sm">
        Buka di Google Maps
      </a>
    </div>
  </div>

  <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-sm border border-blue-200">
    <iframe src="https://www.google.com/maps?q=tasikmalaya&output=embed" width="100%" height="300"
      allowfullscreen="" loading="lazy" class="w-full h-full border-0"></iframe>
  </div>
</div>

        </div>
    <?php endif; ?>
</div>
