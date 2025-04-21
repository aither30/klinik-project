<div class="m-4 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg shadow-xl max-w-4xl mx-auto">

    <?php $form = $this->beginWidget('CActiveForm', [
        'id' => 'patient-form',
        'enableAjaxValidation' => false,
    ]); ?>

    <h2 class="text-3xl font-bold text-gray-900 mb-4">Data Pasien</h2>

    <p class="note text-sm text-gray-600 mb-6">Fields with <span class="required text-red-500">*</span> are required.</p>

    <?php echo $form->errorSummary($model, null, null, ['class' => 'text-red-500 text-sm mb-6']); ?>

    <div class="space-y-6">
        <!-- ID Pasien -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'id', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model, 'id', array('size'=>20, 'readonly'=>true, 'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none')); ?>
            <?php echo $form->error($model, 'id', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Nama -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'name', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model, 'name', array('size'=>60, 'maxlength'=>100, 'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none')); ?>
            <?php echo $form->error($model, 'name', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Email -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'email', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>100, 'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none')); ?>
            <?php echo $form->error($model, 'email', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Kabupaten -->
<div class="flex flex-col">
    <?php echo $form->labelEx($model, 'kabupaten_id', ['class' => 'text-gray-700 font-medium']); ?>
    <?php echo $form->dropDownList($model, 'kabupaten_id', CHtml::listData(Kabupaten::model()->findAll(), 'id', 'nama_kabupaten'), array(
        'prompt' => 'Pilih Kabupaten',
        'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none',
    )); ?>
    <?php echo $form->error($model, 'kabupaten_id', ['class' => 'text-red-500 text-sm']); ?>
</div>

        <!-- Address -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'address', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textArea($model, 'address', array('rows'=>6, 'cols'=>50, 'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none')); ?>
            <?php echo $form->error($model, 'address', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Phone -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'phone', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model, 'phone', array('size'=>20, 'class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none')); ?>
            <?php echo $form->error($model, 'phone', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Age -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'age', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model, 'age', ['class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none']); ?>
            <?php echo $form->error($model, 'age', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Gender -->
        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'gender', ['class' => 'text-gray-700 font-medium']); ?>
            <?php echo $form->dropDownList($model, 'gender', array('M' => 'Male', 'F' => 'Female'), ['class' => 'mt-2 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none']); ?>
            <?php echo $form->error($model, 'gender', ['class' => 'text-red-500 text-sm']); ?>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <?php echo CHtml::submitButton('Save', [
                'class' => 'px-8 py-3 mt-6 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500'
            ]); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
