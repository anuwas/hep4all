<?php
/* @var $this OccupationmasterController */
/* @var $model OccupationMaster */

$this->breadcrumbs=array(
	'Occupation Masters'=>array('index'),
	$model->occupation_id=>array('view','id'=>$model->occupation_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OccupationMaster', 'url'=>array('index')),
	array('label'=>'Create OccupationMaster', 'url'=>array('create')),
	array('label'=>'View OccupationMaster', 'url'=>array('view', 'id'=>$model->occupation_id)),
	array('label'=>'Manage OccupationMaster', 'url'=>array('admin')),
);
?>

<h1>Update OccupationMaster <?php echo $model->occupation_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>