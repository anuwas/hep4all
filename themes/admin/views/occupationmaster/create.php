<?php
/* @var $this OccupationmasterController */
/* @var $model OccupationMaster */

$this->breadcrumbs=array(
	'Occupation Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OccupationMaster', 'url'=>array('index')),
	array('label'=>'Manage OccupationMaster', 'url'=>array('admin')),
);
?>

<h1>Create OccupationMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>