<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_id), array('view', 'id'=>$data->product_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_desc')); ?>:</b>
	<?php echo CHtml::encode($data->product_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_image')); ?>:</b>
	<?php echo CHtml::encode($data->product_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_link')); ?>:</b>
	<?php echo CHtml::encode($data->product_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creatged_date')); ?>:</b>
	<?php echo CHtml::encode($data->creatged_date); ?>
	<br />

	*/ ?>

</div>