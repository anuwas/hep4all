<?php
/* @var $this ProductcategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->product_category_id,
);

$this->menu=array(
	array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'Create ProductCategory', 'url'=>array('create')),
	array('label'=>'Update ProductCategory', 'url'=>array('update', 'id'=>$model->product_category_id)),
	array('label'=>'Delete ProductCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>View ProductCategory #<?php echo $model->product_category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_category_id',
		'product_category_name',
		'created_date',
	),
)); ?>
