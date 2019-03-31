<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
    	
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        if (!Yii::app()->user->isGuest)
            $this->render('admin-dashboard');
        else
            $this->redirect(array('login'));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error)
        {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm']))
        {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate())
            {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest)
            $this->redirect('backend.php?r=site/index');
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('index.php');
    }
    
    public function actionDownloadexcel()
    {
      Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
      $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                             ->setLastModifiedBy("Maarten Balliauw")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
 
 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Exercise ID')
            ->setCellValue('B1', 'Title')
            ->setCellValue('C1', 'Access Type')
            ->setCellValue('D1', 'Type')
            ->setCellValue('E1', 'Category')
            ->setCellValue('F1', 'Position')
            ->setCellValue('G1', 'Description')
            ->setCellValue('H1', 'Created date');
 
// Miscellaneous glyphs, UTF-8
$j = 2;
$access='Public';
//
$exercise=Exercises::model()->with('exerciseType','mainCategory','position')->findAll();
foreach ($exercise as $value) {
	
	if($value->exercise_access_type==1)
	{
		$access='Private';
	}
	else 
	{
		$access='Public';
	}
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$j, $value->exercise_id)
    ->setCellValue('B'.$j, $value->exercise_title)
    ->setCellValue('C'.$j, $access)
    ->setCellValue('D'.$j, $value->exerciseType->exercise_type_name)
    ->setCellValue('E'.$j, $value->mainCategory->exercise_category_name)
    ->setCellValue('F'.$j, $value->position->position_master_name)
    ->setCellValue('G'.$j, $value->description)
    ->setCellValue('H'.$j, $value->created_date);
   
     $j = $j + 1;
}
            
 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Exercise');
 
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
 
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="exercise.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
      Yii::app()->end();
    }

}