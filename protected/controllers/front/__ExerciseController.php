<?php
class ExerciseController extends Controller
{
	public function actionIndex($type=false)
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$criteria = new CDbCriteria;
		$criteria->condition="exercise_access_type=2";
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
    
		$exercise=Exercises::model()->findAll($criteria);
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise,'exercise'=>$exercise,'pages'=>$pages));
	}
	
	
	public function actionGroup($ytpe=false)
	{	
    
		$type='';
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$type=$_REQUEST['type'];
		$criteriaa = new CDbCriteria;
		switch ($type)
		{
			case 'hep4all':
				$criteriaa->condition="user_id=1";
				Yii::app()->session['menu_grup']='1';
				break;
				
				case 'hep4all Public':
					$criteria->condition="exercise_access_type!=1";
					Yii::app()->session['menu_grup']='2';
				break;
				
				case 'Public':
					$criteriaa->condition="exercise_access_type=2 and user_id!=1";
					Yii::app()->session['menu_grup']='3';
				break;
				
				case 'Private':
					$criteriaa->condition="user_id=$userid AND exercise_access_type=1";
					Yii::app()->session['menu_grup']='4';
				break;
		}
		
	
   		$count=Exercises::model()->count($criteriaa);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteriaa);
    
		$exercise=Exercises::model()->findAll($criteriaa);
		
	
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise,'exercise'=>$exercise,'pages'=>$pages));
	
		}
	
	
	public function actionCategory($type=false)
	{
		$manageexercisemenu=new ManageExerciseMenu();
		$type='';
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$type=$_REQUEST['type'];
		$criteria = new CDbCriteria;
		
		$categoryid=$manageexercisemenu->getCategoryNameByCategory($type);
		
		if(Yii::app()->session['menu_grup'])
		{
			switch (Yii::app()->session['menu_grup']) {
				case 1:
				$criteria->condition="main_category=$categoryid and user_id=1";
				break;
				
				case 2:
				$criteria->condition="main_category=$categoryid and exercise_access_type!=1";
				break;
				
				case 3:
				$criteria->condition="main_category=$categoryid and exercise_access_type=2 and user_id!=1";
				break;
				
				case 4:
				$criteria->condition="main_category=$categoryid and exercise_access_type=1 and user_id=$userid";
				break;
				
			}
		}
		else 
		{
			$criteria->condition="main_category=$categoryid and exercise_type_id=2";
		}
		
		
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
    
		$exercise=Exercises::model()->findAll($criteria);
		
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise,'exercise'=>$exercise,'pages'=>$pages));
	}
	
	
	public function actionPosition($type=false)
	{
		$mangeexercisemenu=new ManageExerciseMenu();
		$type='';
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$type=$_REQUEST['type'];
		$criteria = new CDbCriteria;
		$positionid=$mangeexercisemenu->getPositionIdByPositionName($type);
		if(Yii::app()->session['menu_grup'])
		{
			switch (Yii::app()->session['menu_grup']) {
				case 1:
				$criteria->condition="position_id=$positionid and user_id=1";
				break;
				
				case 2:
				$criteria->condition="position_id=$positionid and exercise_access_type!=1";
				break;
				
				case 3:
				$criteria->condition="position_id=$positionid and exercise_access_type=2 and user_id!=1";
				break;
				
				case 4:
				$criteria->condition="position_id=$positionid and exercise_access_type=1 and user_id=$userid";
				break;
				
			}
		}
		else 
		{
			$criteria->condition="position_id=$positionid and exercise_type_id=2";
		}
		
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
    
		$exercise=Exercises::model()->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise,'exercise'=>$exercise,'pages'=>$pages));
			}
			
			
			public function actionEmailprint()
			{
				$printmasterid=0;
				$userid=Yii::app()->session['user_id'];
				$criteria = new CDbCriteria;
				$criteria->order = 'serial ASC';
				$criteria->condition="t.user_id=$userid";
				$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
				$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
				$this->render('emailprint',array('model'=>$user,'printexercise'=>$printexercise));
			}
			
			public function actionSharetemplate()
			{
				$printmasterid=0;
				$userid=Yii::app()->session['user_id'];
				$criteria = new CDbCriteria;
				$criteria->order = 'serial ASC';
				$criteria->condition="t.user_id=$userid";
				$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
				$loggeduse=Users::model()->findByPk($userid);
				//$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
				$criteria = new CDbCriteria;
				$criteria->condition="user_id!=$userid AND user_id!=1";
				$alluser=Users::model()->findAll($criteria);
				$this->render('sharetemplate',array('model'=>$loggeduse,'printexercise'=>$printexercise,'allusers'=>$alluser));
			}
			
			public function actionSendemailtoprint()
			{
				$userid=Yii::app()->session['user_id'];
				$users=Users::model()->findByPk($userid);
				$to = $_REQUEST['toemail'];
				$subject = "HEP4all - Exercises";
				
				$message = "<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<table>
					<tr>
						<td>".$users->first_name." has created a home exercise program for you.</td>
					</tr>
					<tr>
						<td>Your exercise code is: ".$users->emailcode."</td>
					</tr>
					<tr>
						<td>Please visit:
						<a href=\"http://hep4all.com/exercise/checkprintexercise\">Click here </a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page.This is a no-reply email address.Please do not reply to this email.The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
				$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
				//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
				mail($to,$subject,$message,$headers);
			}
			public function actionCreatecodeforfreeprint()
			{
				$refid=$_REQUEST['refid'];
				$code=$this->generateRandomString();
				$printmastercode=new PrintMasterCode();
				$printmastercode->print_master_id=$refid;
				$printmastercode->print_code=$code;
				$printmastercode->save();
				
				echo $code;
			}
			public function actionSendtemplateemailtoprint()
			{
				$refid=$_REQUEST['refid'];
				$code=$this->generateRandomString();
				$printmastercode=new PrintMasterCode();
				$printmastercode->print_master_id=$refid;
				$printmastercode->print_code=$code;
				$printmastercode->save();
				
				$templateemailhistory=new TemplateEmailHistory();
				$templateemailhistory->user_id=Yii::app()->session['user_id'];
				$templateemailhistory->print_master_id=$refid;
				$templateemailhistory->print_master_code_id=$printmastercode->print_master_code_id;
				$templateemailhistory->code=$code;
				$templateemailhistory->to_email=$_REQUEST['toemail'];
				$templateemailhistory->save();
				
				
				$userid=Yii::app()->session['user_id'];
				$users=Users::model()->findByPk($userid);
				$to = $_REQUEST['toemail'];
				$subject = "HEP4all - Exercises";
				
				$message = "<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<table>
					<tr>
						<td>".$users->first_name." has created a home exercise program for you.</td>
					</tr>
					<tr>
						<td>Your exercise code is: ".$code."</td>
					</tr>
					<tr>
						<td>Please visit:
						<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here </a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page.This is a no-reply email address.Please do not reply to this email.The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
				$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
				//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
				mail($to,$subject,$message,$headers);
				
				$printmaster=PrintMaster::model()->findByPk($refid);
				echo $printmaster->print_master_name;
				
			}
			
			public function actionResendcode()
			{
				
				$tehid=$_REQUEST['tehid'];
				$templateemailhistory=TemplateEmailHistory::model()->findByPk($tehid);
				$code=$templateemailhistory->code;
				$userid=Yii::app()->session['user_id'];
				$users=Users::model()->findByPk($userid);
				$to = $templateemailhistory->to_email;
				$subject = "HEP4all - Exercises";
				$message = "<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<table>
					<tr>
						<td>".$users->first_name." has created a home exercise program for you.</td>
					</tr>
					<tr>
						<td>Your exercise code is: ".$code."</td>
					</tr>
					<tr>
						<td>Please visit:
						<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here </a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page.This is a no-reply email address.Please do not reply to this email.The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
				$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
				//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
				mail($to,$subject,$message,$headers);
				
				
			}
			public function actionCheckprintexercise()
			{
				$msg='';
				if($_POST)
				{
					$code=$_REQUEST['emailcode'];
					$users=Users::model()->findByAttributes(array('emailcode'=>$code));
					if(!$users)
					{
						$msg='Please provide valid code';
					}
					else 
					{
						$userid=$users->user_id;
						$criteria = new CDbCriteria;
						$criteria->order = 'serial ASC';
						$criteria->condition="t.user_id=$userid";
						$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
						$this->render('showemailexercise',array('printexercise'=>$printexercise));
						exit;
					}
				}
				$this->render('checkcode',array('msg'=>$msg));
			}
			
		public function actionCheckprintexercisetemplate()
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
			
	public function actionShowsharedbyothers()
	{
		//$printmasterid=$users->print_master_id;
		$printmasterid=$_REQUEST['id'];
		$printmastercode=PrintMasterCode::model()->findByAttributes(array('print_master_id'=>$printmasterid));
		//Yii::app()->session['print_master_id']=$printmasterid;
		//Yii::app()->session['print_code']=$code;
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.print_master_id=$printmasterid";
		$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
		$this->render('showemailexercisetemplate',array('printexercise'=>$printexercise,'code'=>$printmastercode->print_code));
	}
			
	public function actionAddtofavourite()
	{
		$id=$_REQUEST['id'];
		$userid=Yii::app()->session['user_id'];
		$favourite_exercise=FavouriteExercise::model()->findAllByAttributes(array('user_id'=>$userid,'exercise_id'=>$id));
		if($favourite_exercise)
		{
			echo 'Already Added';
		}
		else
		{
			$favourite_exercise=new FavouriteExercise();
			$favourite_exercise->exercise_id=$id;
			$favourite_exercise->user_id=$userid;
			$favourite_exercise->save();
			echo 'Added to favorites';
		}
	}
	
	public function actionRemoveallprintexercise()
	{
		$userid=Yii::app()->session['user_id'];
		PrintExercise::model()->deleteAllByAttributes(array('user_id'=>$userid));
		$this->redirect(array('index'));
	}
	
	public function actionSearch()
	{
		
		$search_option=$_REQUEST['search_option'];
		$search_text=$_REQUEST['search_text'];
		
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$criteria = new CDbCriteria;
		switch ($search_option) {
			
			case 'All':
				if($search_text)
				{
					$criteria->addSearchCondition('exercise_title', $search_text);
				}
			break;
			
			case 'Exercise':
				$criteria->addSearchCondition('exercise_title', $search_text);
			break;
			
			case 'Members':
			//echo 'Members';
			break;
		}
		
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=20;
    	$pages->applyLimit($criteria);
		$exercise=Exercises::model()->findAll($criteria);
		
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise,'exercise'=>$exercise,'pages'=>$pages));
		
	}
	
protected function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
public function actionDeleteemailhistory()
{
	$id=$_REQUEST['id'];
	TemplateEmailHistory::model()->findByPk($id)->delete();
}

}