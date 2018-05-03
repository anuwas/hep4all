<?php
/* @var $this PrintmastercodeController */
/* @var $model PrintMasterCode */

$this->breadcrumbs=array(
	'Print Master Codes'=>array('index'),
	$model->print_master_code_id=>array('view','id'=>$model->print_master_code_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrintMasterCode', 'url'=>array('index')),
	array('label'=>'Create PrintMasterCode', 'url'=>array('create')),
	array('label'=>'View PrintMasterCode', 'url'=>array('view', 'id'=>$model->print_master_code_id)),
	array('label'=>'Manage PrintMasterCode', 'url'=>array('admin')),
);
?>

<h1>Update PrintMasterCode <?php echo $model->print_master_code_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>