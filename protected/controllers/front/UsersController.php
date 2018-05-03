<?php
class UsersController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionRegister()
	{
		if($_POST)
		{
			$checkuser=Users::model()->findByAttributes(array('email'=>$_REQUEST['email']));
			if($checkuser){
				$msg='Email already exist!';
				Yii::app()->session['msg'] = $msg;
				Yii::app()->session['status'] = 0;
				$this->render('registrationform');
			}
			else{
				$model=new Users();
				$model->first_name=$_REQUEST['first-name'];
				$model->last_name=$_REQUEST['last-name'];
				$model->email=$_REQUEST['email'];
				$model->pass_word=$_REQUEST['pass'];
				if($model->save())
				{
					$msg='Successfully Registered ! Please check your eamil to active your account!';
					Yii::app()->session['msg'] = $msg;
					Yii::app()->session['status'] = 1;
					//$username=$_REQUEST['first-name']." ".$_REQUEST['last-name'];
					$username=$_REQUEST['first-name'];
					$id=$model->user_id;
					$this->sendEmailToUser($_REQUEST['email'], $username,$id);
					$this->sendMailToAdmin($_REQUEST['first-name'], $_REQUEST['last-name'], $_REQUEST['email']);
					//$this->redirect('register');
					$this->render('postregister');
				}
			}
			
		}
		else 
		{
			$this->render('registrationform');
		}
		
	}
	
	public function actionGpluslogin()
	{
		$model=new Users();
		$email=$_REQUEST['semail'];
		$users=Users::model()->findByAttributes(array('email'=>$email));
		if($users)
		{
				if($users->active_inactive==1)
				{
					Yii::app()->session['first_name'] = $users->first_name;
					Yii::app()->session['last_name'] = $users->last_name;
					Yii::app()->session['user_id'] = $users->user_id;
					//$this->redirect('dashboard');
					echo 'login';
				}
				else {
					echo 'notactivated';
				}
		}
		else 
		{
			$model->first_name=$_REQUEST['first_name'];
			$model->last_name=$_REQUEST['last_name'];
			$model->email=$_REQUEST['semail'];
			$password=$this->generateRandomString();
			$model->pass_word=$password;
			if($model->save())
			{
				//$username=$_REQUEST['first_name']." ".$_REQUEST['last_name'];
				$username=$_REQUEST['first_name'];
				$id=$model->user_id;
				$this->sendEmailToGplusUser($email, $username,$id,$password);
				$this->sendMailToAdmin($_REQUEST['first_name'], $_REQUEST['last_name'],$_REQUEST['semail']);
				echo 'register';
			}
		}
	}
	
	public function actionTerms()
	{
		$this->render('terms');
	}
	public function actionForgotpassword()
	{
		if($_POST)
		{
			$email=$_REQUEST['email'];
			$users=Users::model()->findByAttributes(array('email'=>$email));
			if($users)
			{
				$password=$this->generateRandomString();
				$users->pass_word=$password;
				$users->save();
				//$usersname=$users->first_name." ".$users->last_name;
				$usersname=$users->first_name;
				$this->sendEmailForForgotPassword($email,$usersname,$password);
				echo 'send';
			}
			else {
			echo 'no_user';
			}
		}
		else 
		{
			$this->render('forgot_password');
		}
		
	}
	
	public function actionLogin()
	{
		if($_POST)
		{
			$email=$_REQUEST['email'];
			$password=$_REQUEST['pass'];
			$users=Users::model()->findByAttributes(array('email'=>$email,'pass_word'=>$password));
			if($users)
			{
				if($users->active_inactive==1)
				{
					Yii::app()->session['first_name'] = $users->first_name;
					Yii::app()->session['last_name'] = $users->last_name;
					Yii::app()->session['user_id'] = $users->user_id;
					if(isset($_REQUEST['rember']))
					{
						$cookie = new CHttpCookie('HEP4alluid', $users->user_id);
						$cookie->expire = time()+60*60*24*180; 
						Yii::app()->request->cookies['HEP4alluid'] = $cookie;
					}
					$this->redirect('index');
				}
				else 
				{
					$msg='Account is not Activated ';
					Yii::app()->session['msg'] = $msg;
					$this->redirect(Yii::app()->request->baseUrl."/#whyhep4ll");
				}
				
			}
			else 
			{
				$msg='Invalid Email/Password';
				Yii::app()->session['msg'] = $msg;
				$this->redirect(Yii::app()->request->baseUrl."/#whyhep4ll");
			}
		}
		
	}
	
	public function actionTwetterlogin()
	{
		Yii::app()->session->open();
	//session_start();
require_once('twitteroauth/twitteroauth.php');
include('tconfig.php');


if(isset(Yii::app()->session['name']) && isset(Yii::app()->session['twitter_id'])) //check whether user already logged in with twitter
{

	echo "Name :".Yii::app()->session['name']."<br>";
	echo "Twitter ID :".Yii::app()->session['twitter_id']."<br>";
	echo "Image :<img src='".Yii::app()->session['image']."'/><br>";
	echo "Name :".Yii::app()->session['email']."<br>";
	echo "<br/><a href='logout.php'>Logout</a>";


}
else // Not logged in
{

	$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
	$request_token = $connection->getRequestToken($OAUTH_CALLBACK); //get Request Token
	
	if(	$request_token)
	{
		$token = $request_token['oauth_token'];
		Yii::app()->session['request_token'] = $token ;
		Yii::app()->session['request_token_secret'] = $request_token['oauth_token_secret'];
		
		switch ($connection->http_code) 
		{
			case 200:
				$url = $connection->getAuthorizeURL($token);
				//redirect to Twitter .
		    	header('Location: ' . $url); 
			    break;
			default:
			    echo "Coonection with twitter Failed";
		    	break;
		}

	}
	else //error receiving request token
	{
		echo "Error Receiving Request Token";
	}
	

}
	}
	
	public function actionTwittercallback()
	{
		Yii::app()->session->open();
require_once('twitteroauth/twitteroauth.php');
include('tconfig.php');


if(isset($_GET['oauth_token']))
{
	$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, Yii::app()->session['request_token'], Yii::app()->session['request_token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	if($access_token)
	{
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
			$params =array();
			$params['include_entities']='false';
			$content = $connection->get('account/verify_credentials',$params);
			//print_r($content);
			//exit;
			if($content && isset($content->screen_name) && isset($content->name))
			{
				Yii::app()->session['name']=$content->name;
				Yii::app()->session['image']=$content->profile_image_url;
				Yii::app()->session['twitter_id']=$content->screen_name;
				Yii::app()->session['email']=$content->email;
				//redirect to main page.
				$this->redirect(Yii::app()->request->baseUrl."/users/twetterlogin"); 

			}
			else
			{
				echo "<h4> Login Error </h4>";
			}
	}

else
{

	echo "<h4> Login Error </h4>";
}

}
else //Error. redirect to Login Page.
{
	$this->redirect(Yii::app()->request->baseUrl);

}
		
	}
	
	public function actionDashboard()
	{
		$this->render('user_dashboard');
	}
	
	public function actionLg()
	{
		echo Yii::app()->request->baseUrl;
	}
	public function actionLogout()
	{
		//unset(Yii::app()->request->cookies['HEP4alluid']);
		Yii::app()->session->destroy();
		$this->redirect('http://www.hep4all.com');
		//echo Yii::app()->request->baseUrl;
	}
	
	public function actionActivation($id)
	{
		$users=Users::model()->findByPk($id);
		if($users)
		{
			$users->active_inactive=1;
			$users->emailcode=$this->generateRandomString();
			$users->save();
			$this->actionWelcomemail($users);
			$this->redirect(Yii::app()->request->baseUrl.'/users/thankactivation');
		}
	}
	
	public function actionThankactivation()
	{
		$this->render('thankactivation');
	}
	
	
	

	
	
protected function sendEmailForForgotPassword($toemail,$user,$pass)
	{
		$to = $toemail;
		$subject = "HEP4all - New Password";

	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<p>Dear $user,</p>
	<table>
	<tr>
	<td>Your password  has been reset. Your new password is : $pass</td>
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

	protected function sendMailToAdmin($firstname,$lastname,$email)
	{
		//$to='todd@emr4all.com';
		 $to='toddj@me.com';
		 
		$subject = "HEP4all - New User Registration";
		
		$message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>
		<p>Hi Administrator,</p>
		<table>
		<tr>
		<td>New User Registered.</td>
		</tr>
		<tr>
		<td>Name :$firstname $lastname</td>
		</tr>
		<tr>
		<td>Email :$email</td>
		</tr>
		</table>
		</body>
		</html>
		";
		
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
	$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
	mail($to,$subject,$message,$headers);
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

protected function sendEmailToGplusUser($toemail,$user,$id,$pass)
	{
		$to = $toemail;
		$subject = "HEP4all - Registration";
		$message='<html>
		<head>
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
                            <div style="text-align: left; color:#222;">Dear '.$user.', <br />
<br />
Your account has been successfully setup and registered for HEP4all.Your Password is : '.$pass.'<br>
		<a href="http://hep4all.com/users/activation/'.$id.'">Click here </a>to log onto your account and get started building your exercise programs.</div>
                                    
                                
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
                                <div align="left"> <input type="checkbox" name="termscheck" id="termscheck" checked> I agree to the <a href="http://hep4all.com/users/terms">Terms Of Use </a></div>
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
			<td align="left" valign="top" width="49%"><a href="https://www.facebook.com/emr4all"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="https://twitter.com/EMR4all"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="https://plus.google.com/u/2/106265479948356117896"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
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
            </table></div>
            <div style="height:40px;"></div>
            </div>
        </center>
    </body>
		</html>';
	/*
	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<p>Dear $user,</p>
	<table>
	
	<tr>
	<td>Your account has been successfully setup and registered for HEP4all.<br>
		<a href=\"http://hep4all.com/users/activation/$id\">Click here </a>to log onto your account and get started building your exercise programs.</td>
	</tr>
	<tr>
	<td> Your Password is : $pass</td>
	</tr>
	</table>
	</body>
	</html>
	";
	*/

// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
	$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
	//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
	mail($to,$subject,$message,$headers);
	}	
	
protected function sendEmailToUser($toemail,$user,$id)
	{
		$to = $toemail;
		$subject = "HEP4all - Registration";
		$message='<html>
		<head>
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
                            <div style="text-align: left; color:#222;">Dear '.$user.', <br />
<br />
Your account has been successfully setup and registered for HEP4all. <br>
		<a href="http://hep4all.com/users/activation/'.$id.'">Click here </a>to log onto your account and get started building your exercise programs.</div>
                                    
                                
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
                                <div align="left"> <input type="checkbox" name="termscheck" id="termscheck" checked> I agree to the <a href="http://hep4all.com/users/terms">Terms Of Use </a></div>
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
			<td align="left" valign="top" width="49%"><a href="https://www.facebook.com/emr4all"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="https://twitter.com/EMR4all"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="https://plus.google.com/u/2/106265479948356117896"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
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
    </body>
		</html>';
		/*
		$message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>
		<p>Dear $user,</p>
		<table>
		<tr>
		<td>Your account has been successfully setup and registered for HEP4all.<br>
		<a href=\"http://hep4all.com/users/activation/$id\">Click here </a>to log onto your account and get started building your exercise programs.</td>
		</tr>
		<tr>
		<td></td>
		</tr>
		</table>
		</body>
		</html>
		";
*/
// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
	$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
	//$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
	mail($to,$subject,$message,$headers);
	}
	
public function actionWelcomemail($user){
		$to = $user->email;
		$subject = "HEP4all - Welcome to HEP4all";
		/*
		$message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>
		
		</body>
		</html>
		";
		*/
		$message='<html>
		<head>
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
        <div align="left" style="width:76%; margin-left:auto; margin-right:auto;">Welcome to HEP4all... <a href="http://www.hep4all.com/newsletters/" target="_blank">View in browser</a></div>
                      <div style="height:10px;"></div>
            <div style="width:74%; margin-left:auto; margin-right:auto; background:#fff;">
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
                                     <div style="text-align: left; color:#222;">Thank you for joning HEP4all. Get building in minutes with your own HEP4all account sponsored by <a href="http://emr4all.com/">EMR4all</a>.
A comprehensive practice management solution that is powering the next generation of healthcare providers.
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
								<td valign="top" id="templateColumns">
									
									<table align="left" border="0" cellpadding="0" cellspacing="0" width="200" class="columnWrapper">
										<tr>
											<td valign="top" class="columnContainer">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnCaptionBlock">
    <tbody class="mcnCaptionBlockOuter">
        <tr>
            <td class="mcnCaptionBlockInner" valign="top" style="padding:9px;">
                

<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnCaptionBottomContent" width="false">
    <tbody><tr>
        <td class="mcnCaptionBottomImageContent" align="center" valign="top" style="padding:0 9px 9px 9px;">   
            <img alt="" src="http://hep4all.com/newsletters/1.jpg" width="164" style="max-width:274px;" class="mcnImage">
        </td>
    </tr>
    <tr>
        <td class="mcnTextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
            <div style="text-align: center; font-size:13px; font-weight:bold;">Add Your Own Photos and Videos</div>
        </td>
    </tr>
</tbody></table>
            </td>
        </tr>
    </tbody>
</table></td>
										</tr>
									</table>									
									<table align="left" border="0" cellpadding="0" cellspacing="0" width="200" class="columnWrapper">
										<tr>
											<td valign="top" class="columnContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnCaptionBlock">
    <tbody class="mcnCaptionBlockOuter">
        <tr>
            <td class="mcnCaptionBlockInner" valign="top" style="padding:9px;">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnCaptionBottomContent" width="false">
    <tbody><tr>
        <td class="mcnCaptionBottomImageContent" align="center" valign="top" style="padding:0 9px 9px 9px;">
            <img alt="" src="http://hep4all.com/newsletters/2.jpg" width="164" style="max-width:274px;" class="mcnImage">
        </td>
    </tr>
    <tr>
        <td class="mcnTextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
            <div style="text-align: center; font-size:13px; font-weight:bold;">Customize Exercise Text Instructions, Create and Save Programs</div>
        </td>
    </tr>
</tbody></table>
            </td>
        </tr>
    </tbody>
</table></td>
										</tr>
									</table>
									
									<table align="left" border="0" cellpadding="0" cellspacing="0" width="200" class="columnWrapper">
										<tr>
										  <td valign="top" class="columnContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnCaptionBlock">
    <tbody class="mcnCaptionBlockOuter">
        <tr>
            <td class="mcnCaptionBlockInner" valign="top" style="padding:9px;">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnCaptionBottomContent" width="false">
    <tbody><tr>
        <td class="mcnCaptionBottomImageContent" align="center" valign="top" style="padding:0 9px 9px 9px;">
            <img alt="" src="http://hep4all.com/newsletters/3.jpg" width="164" style="max-width:274px;" class="mcnImage">
        </td>
    </tr>
    <tr>
        <td class="mcnTextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
            <div style="text-align: center; font-size:13px; font-weight:bold;">Print or Email Unlimited Programs Customized With Your Companies Information</div>
            
        </td>
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
                            
                            <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"><a href="http://www.hep4all.com/help/" target="_blank"><img align="center" alt="" src="http://hep4all.com/newsletters/buttons.png"  class="mcnImage"></a>
                                <div>&nbsp;</div>    
                                <div align="left"> <a href="http://hep4all.com/users/terms">Terms Of Use </a></div>
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
			<td align="left" valign="top" width="49%"><a href="https://www.facebook.com/emr4all"><img src="http://www.scwliquors.com/wp-content/uploads/2015/09/fb.png"></a> <a href="https://twitter.com/EMR4all"><img src="http://hep4all.com/newsletters/ts.png"></a> <a href="https://plus.google.com/u/2/106265479948356117896"><img src="http://hep4all.com/newsletters/g+.png"></a></td>
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
4205 San Felipe Road #100 San Jose, CA 95135</div>                        </td>
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
    </body>
		</html>';

// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
	$headers .= 'From:HEP4all <info@hep4all.com>' . "\r\n";
	$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
	mail($to,$subject,$message,$headers);
	}
}