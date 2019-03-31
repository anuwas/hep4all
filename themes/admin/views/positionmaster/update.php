<?php
/* @var $this PositionmasterController */
/* @var $model PositionMaster */

$this->breadcrumbs=array(
	'Position Masters'=>array('index'),
	$model->position_master_id=>array('view','id'=>$model->position_master_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PositionMaster', 'url'=>array('index')),
	array('label'=>'Create PositionMaster', 'url'=>array('create')),
	array('label'=>'View PositionMaster', 'url'=>array('view', 'id'=>$model->position_master_id)),
	array('label'=>'Manage PositionMaster', 'url'=>array('admin')),
);
?>

<h1>Update PositionMaster <?php echo $model->position_master_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>