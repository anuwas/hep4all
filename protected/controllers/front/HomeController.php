<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionContact()
	{
		if($_POST)
		{
			$name=$_REQUEST['name'];
			$email=$_REQUEST['email'];
			$message=$_REQUEST['message'];
			$this->sendContactEmail($email, $name, $message);
			$this->redirect('thankcontact');
		}
	}
	
	public function actionThankcontact()
	{
		$this->render('thankcontact');
	}
	
protected function sendContactEmail($toemail,$user,$msg)
	{
		$from = $toemail;
		$subject = "HEP4all - Contact MESSAGE";
		//$to='info@hep4all.com';
		$to='toddj@me.com';
	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<p>Dear,Info Hep4all</p>
	<table>
	<tr>
	<td>User : $user</td>
	</tr>
	<tr>
	<td>Email : $toemail</td>
	</tr>
	<tr>
	<td>Message : $msg</td>
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
	$headers .= 'Cc: sudhu.void@gmail.com' . "\r\n";
	mail($to,$subject,$message,$headers);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}