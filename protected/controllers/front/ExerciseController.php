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
						$getuser=Users::model()->findByAttributes(array('user_id'=>$printexercise[0]->user_id));
						if(Yii::app()->session['user_id']){
							$this->render('showemailexercisetemplate',array('printexercise'=>$printexercise,'code'=>$code,'senduser'=>$getuser));
						}else{
							$this->render('showemailexercisetemplatenotlogin',array('printexercise'=>$printexercise,'code'=>$code,'senduser'=>$getuser));
						}
						
						exit;
					}
				}
				$this->render('checkcodetemplate',array('msg'=>$msg));
			}
//this is using for direct link from email
public function actionCheckprintexercisetemplatedirect($code)
{
	$msg='';
	$code=$_REQUEST['code'];
	$users=PrintMasterCode::model()->findByAttributes(array('print_code'=>$code));
	$printmasterid=$users->print_master_id;
	Yii::app()->session['print_master_id']=$printmasterid;
	Yii::app()->session['print_code']=$code;
	$criteria = new CDbCriteria;
	$criteria->order = 'serial ASC';
	$criteria->condition="t.print_master_id=$printmasterid";
	$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
	$getuser=Users::model()->findByAttributes(array('user_id'=>$printexercise[0]->user_id));
	if(Yii::app()->session['user_id']){
		$this->render('showemailexercisetemplate',array('printexercise'=>$printexercise,'code'=>$code,'senduser'=>$getuser));
	}else{
		$this->render('showemailexercisetemplatenotlogin',array('printexercise'=>$printexercise,'code'=>$code,'senduser'=>$getuser));
	}
	
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
		$getuser=Users::model()->findByAttributes(array('user_id'=>$printexercise[0]->user_id));
		$this->render('reusetemplate',array('printexercise'=>$printexercise,'code'=>$printmastercode->print_code,'senduser'=>$getuser));
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
		$exstr='';
		
		//$search_option=$_REQUEST['search_option'];
		$search_text=$_REQUEST['search_text'];
		$exercisename=$search_text;
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$criteria = new CDbCriteria;
		if($search_text)
				{
					
					$exstr='';
					$exnamearr=explode(" ", $exercisename);
					if(sizeof($exnamearr)>0){
						foreach ($exnamearr as $value) {
						if($value!=''){
							if($exstr==''){
								$exstr.='exercise_title LIKE \'%'.$value.'%\'';
							}else{
								$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
							}
						}
						}
					}
					else {
					$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
					}
					
					$criteria->condition="exercise_access_type!=1 AND $exstr";
					//$criteria->addSearchCondition('exercise_title', $search_text);
					//echo $exstr;
				}
				else 
				{
					$criteria->condition="exercise_access_type!=1";
				}
				/*
		switch ($search_option) {
			
			case 'All':
				if($search_text)
				{
					
					$exstr='';
					$exnamearr=explode(" ", $exercisename);
					if(sizeof($exnamearr)>0){
						foreach ($exnamearr as $value) {
						if($value!=''){
							if($exstr==''){
								$exstr.='exercise_title LIKE \'%'.$value.'%\'';
							}else{
								$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
							}
						}
						}
					}
					else {
					$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
					}
					
					$criteria->condition="exercise_access_type!=1 AND $exstr";
					//$criteria->addSearchCondition('exercise_title', $search_text);
					//echo $exstr;
				}
				else 
				{
					$criteria->condition="exercise_access_type!=1";
				}
			break;
			
			case 'Exercise':
				
					$exnamearr=explode(" ", $exercisename);
					if(sizeof($exnamearr)>1){
					foreach ($exnamearr as $value) {
					if($value!=''){
						if($exstr==''){
							$exstr.='exercise_title LIKE \'%'.$value.'%\'';
						}else{
							$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
						}
					}
					}
					}
					else{
					$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
					}
					
					$criteria->condition="exercise_access_type!=1 AND user_id!=1 AND $exstr";
				//$criteria->condition="exercise_access_type!=1";
				//$criteria->addSearchCondition('exercise_title', $search_text);
				
			break;
			
			case 'Members':
				
					$exnamearr=explode(" ", $exercisename);
				
					if(sizeof($exnamearr)>1)
					{
						foreach ($exnamearr as $value) {
						if($value!=''){
							if($exstr==''){
								$exstr.='exercise_title LIKE \'%'.$value.'%\'';
							}else{
								$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
							}
						}
						}
					}
					else{
					$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
					}
					//$criteria->condition="exercise_access_type!=1 AND $exstr";
			$criteria->condition="exercise_access_type!=1 AND user_id!=$userid AND $exstr";
			//$criteria->addSearchCondition('exercise_title', $search_text);
			break;
		}
		*/
				
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

public function actionSendemailtoprint()
			{
				$userid=Yii::app()->session['user_id'];
				$users=Users::model()->findByPk($userid);
				$to = $_REQUEST['toemail'];
				$subject = "HEP4all - Exercises";
				/*
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
						<a href=\"http://hep4all.com/exercise/checkprintexercise\">Click here</a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				*/
				$message='<head>
		  <style type="text/css">
		p{
			margin:10px 0;
			padding:0;
		}
		table{
			border-collapse:collapse;
		}
		h1,h2,h3,h4,h5,h6{
			display:block;
			margin:0;
			padding:0;
		}
		img,a img{
			border:0;
			height:auto;
			outline:none;
			text-decoration:none;
		}
		body,#bodyTable,#bodyCell{
			height:100%;
			margin:0;
			padding:0;
			width:100%;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		table{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		p,a,li,td,blockquote{
			mso-line-height-rule:exactly;
		}
		a[href^=tel],a[href^=sms]{
			color:inherit;
			cursor:default;
			text-decoration:none;
		}
		p,a,li,td,body,table,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
			line-height:100%;
		}
		a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:none !important;
			font-size:inherit !important;
			font-family:inherit !important;
			font-weight:inherit !important;
			line-height:inherit !important;
		}
		#bodyCell{
			padding:10px;
		}
		.templateContainer{
			max-width:600px !important;
		}
		a.mcnButton{
			display:block;
		}
		.mcnImage{
			vertical-align:bottom;
		}
		.mcnTextContent{
			word-break:break-word;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		.mcnDividerBlock{
			table-layout:fixed !important;
		}
	
		body,#bodyTable{
			background-color:#FAFAFA;
		}
	
		#bodyCell{
			border-top:0;
		}
	
		.templateContainer{
			border:0;
		}
	
		h1{
			color:#202020;
			font-family:Helvetica;
			font-size:26px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h2{
			color:#202020;
			font-family:Helvetica;
			font-size:22px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h3{
			color:#202020;
			font-family:Helvetica;
			font-size:20px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h4{
			color:#202020;
			font-family:Helvetica;
			font-size:18px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		#templatePreheader{
			background-color:#ffffff;
			border-top:4px solid #4c7194;
			border-bottom:0px solid #cccccc;
			padding-top:9px;
			padding-bottom:0px;
		}
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
		#templateHeader{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:0;
		}
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateBody{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:0;
			padding-bottom:0;
		}
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateColumns{
			background-color:#FFFFFF;
			border-top:0;
			padding-top:0;
			padding-bottom:9px;
		}
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateColumns .columnContainer .mcnTextContent a,#templateColumns .columnContainer .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateFooter{
			background-color:#ffffff;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:9px;
		}
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
	@media only screen and (min-width:768px){
		.templateContainer{
			width:600px !important;
		}

}	@media only screen and (max-width: 480px){
		body,table,td,p,a,li,blockquote{
			-webkit-text-size-adjust:none !important;
		}

}	@media only screen and (max-width: 480px){
		body{
			width:100% !important;
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		#bodyCell{
			padding-top:10px !important;
		}

}	@media only screen and (max-width: 480px){
		.columnWrapper{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImage{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnShareContent,.mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnBoxedTextContentContainer{
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupContent{
			padding:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardBottomImageContent{
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockInner{
			padding-top:0 !important;
			padding-bottom:0 !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockOuter{
			padding-top:9px !important;
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnTextContent,.mcnBoxedTextContentColumn{
			padding-right:18px !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
			padding-right:18px !important;
			padding-bottom:0 !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcpreview-image-uploader{
			display:none !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h1{
			font-size:22px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h2{
			font-size:20px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h3{
			font-size:18px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h4{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader{
			display:block !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

} </style>
</head>
    <body>
        <center>
        <div style="width:100%; background:#fafafa;">
        <div style="height:40px;"></div>
            <div style="width:76%; margin-left:auto; margin-right:auto; background:#fff;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                              <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <img align="center" alt="" src="http://hep4all.com/newsletters/banner.jpg" width="564" style="max-width:750px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <div style="text-align: left; color:#222;">
'.$users->first_name.' has created a home exercise program for you.<br>
Your exercise code is: '.$users->emailcode.'<br>
Please visit: '."<a href=\"http://hep4all.com/exercise/checkprintexercise\">Click here</a>".'  and enter your exercise code to retrieve your custom exercise program.<br>
If the above is not a clickable link, please copy and paste the URL in your browser\'s address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender\'s email address is '.$users->email.'
Please save code for future use.</div>
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"><a href="http://www.hep4all.com/help/" target="_blank"><img align="center" alt="" src="http://hep4all.com/newsletters/buttons.png"  class="mcnImage"></a>
                                <div>&nbsp;</div>    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
                 </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="right" valign="middle" width="49%">Like us on</td>
			<td valign="top" width="2%">&nbsp;</td>
			<td align="left" valign="top" width="49%"><a href="#"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="599" class="mcnTextContentContainer">
                    <tbody><tr>
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        <div class="smalltext">
<div>&nbsp;</div>
<div style="text-align: center;">This email was sent by HEP4all <br>
<br>
4205 San Felipe Road #100 San Jose, CA 95135</div> </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
						
                    </td>
                </tr>
            </table>
            </div>
            <div style="height:40px;"></div>
            </div>
        </center>
    </body>';
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
				$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
				//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
				mail($to,$subject,$message,$headers);
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
				/*
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
						<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here</a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				*/
				$message='<head>
		  <style type="text/css">
		p{
			margin:10px 0;
			padding:0;
		}
		table{
			border-collapse:collapse;
		}
		h1,h2,h3,h4,h5,h6{
			display:block;
			margin:0;
			padding:0;
		}
		img,a img{
			border:0;
			height:auto;
			outline:none;
			text-decoration:none;
		}
		body,#bodyTable,#bodyCell{
			height:100%;
			margin:0;
			padding:0;
			width:100%;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		table{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		p,a,li,td,blockquote{
			mso-line-height-rule:exactly;
		}
		a[href^=tel],a[href^=sms]{
			color:inherit;
			cursor:default;
			text-decoration:none;
		}
		p,a,li,td,body,table,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
			line-height:100%;
		}
		a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:none !important;
			font-size:inherit !important;
			font-family:inherit !important;
			font-weight:inherit !important;
			line-height:inherit !important;
		}
		#bodyCell{
			padding:10px;
		}
		.templateContainer{
			max-width:600px !important;
		}
		a.mcnButton{
			display:block;
		}
		.mcnImage{
			vertical-align:bottom;
		}
		.mcnTextContent{
			word-break:break-word;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		.mcnDividerBlock{
			table-layout:fixed !important;
		}
	
		body,#bodyTable{
			background-color:#FAFAFA;
		}
	
		#bodyCell{
			border-top:0;
		}
	
		.templateContainer{
			border:0;
		}
	
		h1{
			color:#202020;
			font-family:Helvetica;
			font-size:26px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h2{
			color:#202020;
			font-family:Helvetica;
			font-size:22px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h3{
			color:#202020;
			font-family:Helvetica;
			font-size:20px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h4{
			color:#202020;
			font-family:Helvetica;
			font-size:18px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		#templatePreheader{
			background-color:#ffffff;
			border-top:4px solid #4c7194;
			border-bottom:0px solid #cccccc;
			padding-top:9px;
			padding-bottom:0px;
		}
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
		#templateHeader{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:0;
		}
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateBody{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:0;
			padding-bottom:0;
		}
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateColumns{
			background-color:#FFFFFF;
			border-top:0;
			padding-top:0;
			padding-bottom:9px;
		}
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateColumns .columnContainer .mcnTextContent a,#templateColumns .columnContainer .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateFooter{
			background-color:#ffffff;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:9px;
		}
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
	@media only screen and (min-width:768px){
		.templateContainer{
			width:600px !important;
		}

}	@media only screen and (max-width: 480px){
		body,table,td,p,a,li,blockquote{
			-webkit-text-size-adjust:none !important;
		}

}	@media only screen and (max-width: 480px){
		body{
			width:100% !important;
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		#bodyCell{
			padding-top:10px !important;
		}

}	@media only screen and (max-width: 480px){
		.columnWrapper{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImage{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnShareContent,.mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnBoxedTextContentContainer{
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupContent{
			padding:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardBottomImageContent{
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockInner{
			padding-top:0 !important;
			padding-bottom:0 !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockOuter{
			padding-top:9px !important;
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnTextContent,.mcnBoxedTextContentColumn{
			padding-right:18px !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
			padding-right:18px !important;
			padding-bottom:0 !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcpreview-image-uploader{
			display:none !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h1{
			font-size:22px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h2{
			font-size:20px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h3{
			font-size:18px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h4{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader{
			display:block !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

} </style>
</head>
    <body>
        <center>
        <div style="width:100%; background:#fafafa;">
        <div style="height:40px;"></div>
            <div style="width:76%; margin-left:auto; margin-right:auto; background:#fff;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                              <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <img align="center" alt="" src="http://hep4all.com/newsletters/banner.jpg" width="564" style="max-width:750px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <div style="text-align: left; color:#222;">
'.$users->first_name.' has created a home exercise program for you.<br>
Your exercise code is: '.$code.'<br>
Please visit: '."<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here</a>".' here and enter your exercise code to retrieve your custom exercise program.<br>
If the above is not a clickable link, please copy and paste the URL in your browser\'s address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender\'s email address is '.$users->email.'
Please save code for future use.</div>
<br>
<div style="text-align: left; color:#222;">
Direct Link : '."<a href=\"http://hep4all.com/exercise/checkprintexercisetemplatedirect?code=$code\">Click here</a>".'  to see your custom exercise program.<br>
</div>
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"><a href="http://www.hep4all.com/help/" target="_blank"><img align="center" alt="" src="http://hep4all.com/newsletters/buttons.png"  class="mcnImage"></a>
                                <div>&nbsp;</div>    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
                 </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="right" valign="middle" width="49%">Like us on</td>
			<td valign="top" width="2%">&nbsp;</td>
			<td align="left" valign="top" width="49%"><a href="#"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="599" class="mcnTextContentContainer">
                    <tbody><tr>
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        <div class="smalltext">
<div>&nbsp;</div>
<div style="text-align: center;">This email was sent by HEP4all <br>
<br>
4205 San Felipe Road #100 San Jose, CA 95135</div> </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
						
                    </td>
                </tr>
            </table>
            </div>
            <div style="height:40px;"></div>
            </div>
        </center>
    </body>';
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
				/*
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
						<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here</a> and enter your exercise code to retrieve your custom exercise program.
						</td>
					</tr>
					<tr>
						<td>If the above is not a clickable link, please copy and paste the URL in your browser's address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender's email address is ".$users->email."</td>
					</tr>
					<tr>
						<td>Please save code for future use.</td>
					</tr>
				</table>
				</body>
				</html>
				";
				*/
				$message='<head>
		  <style type="text/css">
		p{
			margin:10px 0;
			padding:0;
		}
		table{
			border-collapse:collapse;
		}
		h1,h2,h3,h4,h5,h6{
			display:block;
			margin:0;
			padding:0;
		}
		img,a img{
			border:0;
			height:auto;
			outline:none;
			text-decoration:none;
		}
		body,#bodyTable,#bodyCell{
			height:100%;
			margin:0;
			padding:0;
			width:100%;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		table{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		p,a,li,td,blockquote{
			mso-line-height-rule:exactly;
		}
		a[href^=tel],a[href^=sms]{
			color:inherit;
			cursor:default;
			text-decoration:none;
		}
		p,a,li,td,body,table,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
			line-height:100%;
		}
		a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:none !important;
			font-size:inherit !important;
			font-family:inherit !important;
			font-weight:inherit !important;
			line-height:inherit !important;
		}
		#bodyCell{
			padding:10px;
		}
		.templateContainer{
			max-width:600px !important;
		}
		a.mcnButton{
			display:block;
		}
		.mcnImage{
			vertical-align:bottom;
		}
		.mcnTextContent{
			word-break:break-word;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		.mcnDividerBlock{
			table-layout:fixed !important;
		}
	
		body,#bodyTable{
			background-color:#FAFAFA;
		}
	
		#bodyCell{
			border-top:0;
		}
	
		.templateContainer{
			border:0;
		}
	
		h1{
			color:#202020;
			font-family:Helvetica;
			font-size:26px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h2{
			color:#202020;
			font-family:Helvetica;
			font-size:22px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h3{
			color:#202020;
			font-family:Helvetica;
			font-size:20px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		h4{
			color:#202020;
			font-family:Helvetica;
			font-size:18px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
	
		#templatePreheader{
			background-color:#ffffff;
			border-top:4px solid #4c7194;
			border-bottom:0px solid #cccccc;
			padding-top:9px;
			padding-bottom:0px;
		}
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
		#templateHeader{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:0;
		}
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateBody{
			background-color:#FFFFFF;
			border-top:0;
			border-bottom:0;
			padding-top:0;
			padding-bottom:0;
		}
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateColumns{
			background-color:#FFFFFF;
			border-top:0;
			padding-top:0;
			padding-bottom:9px;
		}
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			color:#202020;
			font-family:Helvetica;
			font-size:16px;
			line-height:150%;
			text-align:left;
		}
	
		#templateColumns .columnContainer .mcnTextContent a,#templateColumns .columnContainer .mcnTextContent p a{
			color:#2BAADF;
			font-weight:normal;
			text-decoration:underline;
		}
	
		#templateFooter{
			background-color:#ffffff;
			border-top:0;
			border-bottom:0;
			padding-top:9px;
			padding-bottom:9px;
		}
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			color:#656565;
			font-family:Helvetica;
			font-size:12px;
			line-height:150%;
			text-align:left;
		}
	
		#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
			color:#656565;
			font-weight:normal;
			text-decoration:underline;
		}
	@media only screen and (min-width:768px){
		.templateContainer{
			width:600px !important;
		}

}	@media only screen and (max-width: 480px){
		body,table,td,p,a,li,blockquote{
			-webkit-text-size-adjust:none !important;
		}

}	@media only screen and (max-width: 480px){
		body{
			width:100% !important;
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		#bodyCell{
			padding-top:10px !important;
		}

}	@media only screen and (max-width: 480px){
		.columnWrapper{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImage{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnShareContent,.mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnBoxedTextContentContainer{
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupContent{
			padding:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardBottomImageContent{
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockInner{
			padding-top:0 !important;
			padding-bottom:0 !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockOuter{
			padding-top:9px !important;
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnTextContent,.mcnBoxedTextContentColumn{
			padding-right:18px !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
			padding-right:18px !important;
			padding-bottom:0 !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcpreview-image-uploader{
			display:none !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h1{
			font-size:22px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h2{
			font-size:20px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h3{
			font-size:18px !important;
			line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	
		h4{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader{
			display:block !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
			font-size:16px !important;
			line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			font-size:14px !important;
			line-height:150% !important;
		}

} </style>
</head>
    <body>
        <center>
        <div style="width:100%; background:#fafafa;">
        <div style="height:40px;"></div>
            <div style="width:76%; margin-left:auto; margin-right:auto; background:#fff;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                              <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <img align="center" alt="" src="http://hep4all.com/newsletters/banner.jpg" width="564" style="max-width:750px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                            <div style="text-align: left; color:#222;">
'.$users->first_name.' has created a home exercise program for you.<br>
Your exercise code is: '.$code.'<br>
Please visit: '."<a href=\"http://hep4all.com/exercise/checkprintexercisetemplate\">Click here</a>".'  and enter your exercise code to retrieve your custom exercise program.<br>
If the above is not a clickable link, please copy and paste the URL in your browser\'s address bar to visit your exercise page. This is a no-reply email address. Please do not reply to this email. The sender\'s email address is '.$users->email.'
Please save code for future use.</div>
                                    <br>
<div style="text-align: left; color:#222;">
Direct Link : '."<a href=\"http://hep4all.com/exercise/checkprintexercisetemplatedirect?code=$code\">Click here</a>".'  to see your custom exercise program.<br>
</div>
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"><a href="http://www.hep4all.com/help/" target="_blank"><img align="center" alt="" src="http://hep4all.com/newsletters/buttons.png"  class="mcnImage"></a>
                                <div>&nbsp;</div>    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
                 </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="right" valign="middle" width="49%">Like us on</td>
			<td valign="top" width="2%">&nbsp;</td>
			<td align="left" valign="top" width="49%"><a href="#"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="#"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="599" class="mcnTextContentContainer">
                    <tbody><tr>
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: normal;">
                        <div class="smalltext">
<div>&nbsp;</div>
<div style="text-align: center;">This email was sent by HEP4all <br>
<br>
4205 San Felipe Road #100 San Jose, CA 95135</div> </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
						
                    </td>
                </tr>
            </table>
            </div>
            <div style="height:40px;"></div>
            </div>
        </center>
    </body>';
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
				$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
				//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
				mail($to,$subject,$message,$headers);
				
				
			}
}