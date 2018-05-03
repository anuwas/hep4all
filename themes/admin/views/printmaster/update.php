<?php
/* @var $this PrintmasterController */
/* @var $model PrintMaster */

$this->breadcrumbs=array(
	'Print Masters'=>array('index'),
	$model->print_master_id=>array('view','id'=>$model->print_master_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrintMaster', 'url'=>array('index')),
	array('label'=>'Create PrintMaster', 'url'=>array('create')),
	array('label'=>'View PrintMaster', 'url'=>array('view', 'id'=>$model->print_master_id)),
	array('label'=>'Manage PrintMaster', 'url'=>array('admin')),
);
?>

<h1>Update PrintMaster <?php echo $model->print_master_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>