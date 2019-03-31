<?php
class CustomhepController extends Controller
{
	public function actionIndex()
	{
		$msg='';
				if($_POST)
				{
					$code=$_REQUEST['emailcode'];
					$users=PrintMasterCode::model()->findByAttributes(array('print_code'=>$code));
					if(!$users)
					{
						$msg='Please provide valid code';
					}
					else 
					{
						$printmasterid=$users->print_master_id;
						Yii::app()->session['print_master_id']=$printmasterid;
						Yii::app()->session['print_code']=$code;
						$criteria = new CDbCriteria;
						$criteria->order = 'serial ASC';
						$criteria->condition="t.print_master_id=$printmasterid";
						$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
						$this->render('showemailexercisetemplate',array('printexercise'=>$printexercise,'code'=>$code));
						exit;
					}
				}
				$this->render('checkcodetemplate',array('msg'=>$msg));
	}
}