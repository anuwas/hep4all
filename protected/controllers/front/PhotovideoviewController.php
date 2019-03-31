<?php
class PhotovideoviewController extends Controller
{
	public function actionPhoto()
	{
		$photoid=0;
		//$photoid=$_REQUEST['id'];
		//$this->render('photoview',array('model'=>$user,'printexercise'=>$printexercise));
		//echo $photoid;
		if(isset($_REQUEST[1]))
		{
			$photoid=$_REQUEST[1];
			$exercise=Exercises::model()->findByPk($photoid);
			$picname=$exercise->picture_1;
			//$this->render('photoview',array('model'=>$exercise,'photo'=>$picname));
			echo '<img src="'.Yii::app()->request->baseUrl.'/upload/exercise/image/'.$picname.'"/>';
		}
		else 
		{
			
			$photoid=$_REQUEST[2];
			$exercise=Exercises::model()->findByPk($photoid);
			$picname=$exercise->picture_2;
			//$this->render('photoview',array('model'=>$exercise,'photo'=>$picname));
			echo '<img src="'.Yii::app()->request->baseUrl.'/upload/exercise/image/'.$picname.'"/>';
		}
		
		
	}
	
	public function actionVideo()
	{
		$videoid=$_REQUEST['id'];
		//$this->render('videoview',array('videoid'=>$videoid));
		echo '<iframe src="//player.vimeo.com/video/'.$videoid.'?portrait=0&color=333" width="1200" height="600" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	public function actionViewallink($id)
	{
		$exercise=Exercises::model()->findByPk($id);
		$this->render('alllinkiview',array('exercise'=>$exercise));
		//print_r($_REQUEST);
	}
}