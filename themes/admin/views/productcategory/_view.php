<?php
/* @var $this ProductcategoryController */
/* @var $data ProductCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_category_id), array('view', 'id'=>$data->product_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>