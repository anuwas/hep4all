<?php
/* @var $this PrintdetailController */
/* @var $model PrintDetail */

$this->breadcrumbs=array(
	'Print Details'=>array('index'),
	$model->print_detail_id=>array('view','id'=>$model->print_detail_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrintDetail', 'url'=>array('index')),
	array('label'=>'Create PrintDetail', 'url'=>array('create')),
	array('label'=>'View PrintDetail', 'url'=>array('view', 'id'=>$model->print_detail_id)),
	array('label'=>'Manage PrintDetail', 'url'=>array('admin')),
);
?>

<h1>Update PrintDetail <?php echo $model->print_detail_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>