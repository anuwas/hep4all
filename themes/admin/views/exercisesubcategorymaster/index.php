<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exercise Sub Category Masters',
);

$this->menu=array(
	array('label'=>'Create ExerciseSubCategoryMaster', 'url'=>array('create')),
	array('label'=>'Manage ExerciseSubCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Exercise Sub Category Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
