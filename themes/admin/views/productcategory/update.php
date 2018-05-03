<?php
/* @var $this ProductcategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->product_category_id=>array('view','id'=>$model->product_category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'Create ProductCategory', 'url'=>array('create')),
	array('label'=>'View ProductCategory', 'url'=>array('view', 'id'=>$model->product_category_id)),
	array('label'=>'Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>Update ProductCategory <?php echo $model->product_category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>