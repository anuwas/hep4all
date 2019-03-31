<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<h2>Admin Dashboard</h2>
<div style="width: 400px;border: 1px solid;">
<table width="50%" cellpadding="0" cellspacing="0">
<tr>
	<td>Download Excell File</td>
	<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/backend.php/?r=site/downloadexcel">Click</a></td>
</tr>
</table>
</div>