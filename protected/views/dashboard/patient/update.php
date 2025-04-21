<?php
/* @var $this DashboardController */
/* @var $model Patient */

$this->breadcrumbs = [
    'Pasien' => ['patientManage'],
    'Edit Pasien',
];
?>

<div class="m-4 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg shadow-xl">
<h1 class="text-4xl font-semibold text-gray-800 mb-6">Edit Data Pasien</h1>

<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'patient-form',
    'enableAjaxValidation' => false,
]); ?>

<p class="text-sm text-gray-600 mb-4">Kolom dengan <span class="text-red-500">*</span> wajib diisi.</p>

<?php echo $form->errorSummary($model, null, null, ['class' => 'text-red-500 mb-6']); ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', ['class' => 'text-gray-700 font-medium']); ?>
        <?php echo $form->textField($model, 'name', [
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
            'placeholder' => 'Nama Pasien',
        ]); ?>
        <?php echo $form->error($model, 'name', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', ['class' => 'text-gray-700 font-medium']); ?>
        <?php echo $form->textField($model, 'email', [
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
            'placeholder' => 'Email Pasien',
        ]); ?>
        <?php echo $form->error($model, 'email', ['class' => 'text-red-500 text-sm']); ?>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'address', ['class' => 'text-gray-700 font-medium']); ?>
        <?php echo $form->textArea($model, 'address', [
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
            'rows' => 4,
            'placeholder' => 'Alamat Pasien',
        ]); ?>
        <?php echo $form->error($model, 'address', ['class' => 'text-red-500 text-sm']); ?>
    </div>

<div class="form-group">
<div class="form-group">
    <?php echo $form->labelEx($model, 'kabupaten', ['class' => 'text-gray-700 font-medium']); ?>
    <?php echo $form->dropDownList($model, 'kabupaten_id', CHtml::listData(Kabupaten::model()->findAll(), 'id', 'nama_kabupaten'), [
        'prompt' => 'Pilih Kabupaten',
        'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
    ]); ?>
    <?php echo $form->error($model, 'kabupaten_id', ['class' => 'text-red-500 text-sm']); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'phone', ['class' => 'text-gray-700 font-medium']); ?>
    <?php echo $form->textField($model, 'phone', [
        'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
        'placeholder' => 'Nomor Telepon',
    ]); ?>
    <?php echo $form->error($model, 'phone', ['class' => 'text-red-500 text-sm']); ?>
</div>
</div>


</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'age', ['class' => 'text-gray-700 font-medium']); ?>
        <?php echo $form->numberField($model, 'age', [
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
            'placeholder' => 'Usia Pasien',
        ]); ?>
        <?php echo $form->error($model, 'age', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'gender', ['class' => 'text-gray-700 font-medium']); ?>
        <?php echo $form->dropDownList($model, 'gender', [
            'M' => 'Laki-laki',
            'F' => 'Perempuan',
        ], [
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 placeholder-gray-500',
        ]); ?>
        <?php echo $form->error($model, 'gender', ['class' => 'text-red-500 text-sm']); ?>
    </div>
</div>

<div class="mb-6">
    <?php echo CHtml::submitButton('Simpan', [
        'class' => 'w-full bg-blue-600 text-white py-3 px-4 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105',
    ]); ?>
</div>

<?php $this->endWidget(); ?>

</div>