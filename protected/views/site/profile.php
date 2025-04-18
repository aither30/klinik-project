<?php
/* @var $this SiteController */
/* @var $model User */
?>

<h1>Profile</h1>

<p><strong>Username:</strong> <?php echo CHtml::encode($model->username); ?></p>
<p><strong>Role:</strong> <?php echo CHtml::encode($model->role); ?></p>

<a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a>
