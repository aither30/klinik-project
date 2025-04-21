<!-- protected/views/dashboard/visit/addVisit.php -->

<?php $form=$this->beginWidget('CActiveForm',['id'=>'add-visit-form']); ?>

<div class="m-6 p-6 bg-white rounded shadow max-w-4xl mx-auto">
  <h2 class="text-xl font-semibold mb-4">Tambah Kunjungan</h2>

  <?php echo $form->hiddenField($visit,'patient_id',['value'=>$patient->id]); ?>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Visit fields -->
    <div>
      <?php echo $form->labelEx($visit,'visit_date'); ?>
      <?php echo $form->textField($visit,'visit_date',['readonly'=>true,'class'=>'w-full border p-2']); ?>
      <?php echo $form->error($visit,'visit_date'); ?>

      <div class="mb-4">
    <label class="font-semibold text-gray-700">Tujuan Berobat</label>
    <input type="text" name="Visit[purpose]" 
           value="<?php echo CHtml::encode($visit->purpose); ?>" 
           class="mt-1 p-2 border rounded w-full" required>
</div>


      <?php echo $form->labelEx($visit,'description'); ?>
      <?php echo $form->textArea($visit,'description',['class'=>'w-full border p-2','rows'=>4]); ?>
      <?php echo $form->error($visit,'description'); ?>

      <?php echo $form->labelEx($visit,'doctor_id'); ?>
      <?php echo $form->dropDownList($visit,'doctor_id',$doctors,['prompt'=>'Pilih Dokter','class'=>'w-full border p-2']); ?>
      <?php echo $form->error($visit,'doctor_id'); ?>
    </div>



    <!-- Prescription + Medicines -->
    <div>
    <div class="mb-4">
    <label class="font-semibold text-gray-700">Nama Treatment Baru</label>
    <input type="text" name="new_treatment_name" class="mt-1 p-2 border rounded w-full" required>
</div>
      <?php echo $form->labelEx($prescription, 'description', ['label' => 'Catatan Resep']); ?>
      <?php echo $form->textArea($prescription,'description',['class'=>'w-full border p-2','rows'=>3]); ?>
      <?php echo $form->error($prescription,'description'); ?>

      <label class="block mt-4 font-medium">Pilih Obat & Jumlah</label>
      <div id="med-list" class="space-y-2"></div>

      <div class="flex items-center space-x-2 mt-2">
        <?php echo CHtml::dropDownList('medicine_dropdown','',$medicines,['prompt'=>'Obat','class'=>'border p-2','id'=>'medicine_dropdown']); ?>
        <input type="number" id="qty_input" value="1" min="1" class="w-16 border p-2"/>
        <button type="button" id="add_med_btn" class="bg-blue-500 text-white px-3 py-1 rounded">Tambah</button>
      </div>
    </div>
  </div>

  <div class="mt-6">
    <?php echo CHtml::submitButton('Simpan',['class'=>'bg-green-600 text-white px-6 py-2 rounded']); ?>
  </div>
</div>

<?php $this->endWidget(); ?>

<script>
let medCount=0;
$('#add_med_btn').click(function(){
  let mid=$('#medicine_dropdown').val();
  let mtxt=$('#medicine_dropdown option:selected').text();
  let qty=$('#qty_input').val();
  if(!mid||qty<1) return alert('Pilih obat & qty');
  let idx=medCount++;
  let row=`<div class="flex items-center space-x-2" id="med${idx}">
    <input type="hidden" name="medicine_ids[]" value="${mid}"/>
    <input type="hidden" name="quantities[]"  value="${qty}"/>
    <span>${mtxt} (x${qty})</span>
    <button type="button" onclick="$('#med${idx}').remove()" class="text-red-600">×</button>
  </div>`;
  $('#med-list').append(row);
});
</script>
