<h1>Update Profil</h1>

<!-- Menampilkan pesan sukses jika ada -->
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<!-- Form untuk mengedit profil -->
<?php echo CHtml::beginForm(); ?>

<div>
    <?php echo CHtml::label('Username', 'username'); ?>
    <?php echo CHtml::textField('User[username]', $user->username, array('readonly' => true)); ?>
</div>

<div>
    <?php echo CHtml::label('Email', 'email'); ?>
    <?php echo CHtml::textField('User[email]', $user->email); ?>
</div>

<div>
    <?php echo CHtml::label('Password', 'password'); ?>
    <?php echo CHtml::passwordField('User[password]'); ?>
    <p class="hint">* Kosongkan jika tidak ingin mengubah password</p>
</div>

<div>
    <?php echo CHtml::label('Role', 'role'); ?>
    <?php echo CHtml::dropDownList('User[role]', $user->role, array('admin' => 'Admin', 'dokter' => 'Dokter', 'perawat' => 'Perawat')); ?>
</div>

<div>
    <?php echo CHtml::submitButton('Simpan'); ?>
</div>

<?php echo CHtml::endForm(); ?>