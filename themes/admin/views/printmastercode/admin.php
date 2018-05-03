<?php
/* @var $this PrintmastercodeController */
/* @var $model PrintMasterCode */

$this->breadcrumbs=array(
	'Print Master Codes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PrintMasterCode', 'url'=>array('index')),
	array('label'=>'Create PrintMasterCode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#print-master-code-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Print Master Codes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'print-master-code-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'print_master_code_id',
		'print_master_id',
		'print_code',
		'created_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
