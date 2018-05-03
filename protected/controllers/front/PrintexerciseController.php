<?php

class PrintexerciseController extends Controller
{
	public function actionAddtoprint()
	{
		//$user_id=$_REQUEST['user_id'];
		$user_id=Yii::app()->session['user_id'];
		$exercise_id=$_REQUEST['exercise_id'];
		$chkexer=PrintExercise::model()->findAllByAttributes(array('user_id'=>$user_id,'exercise_id'=>$exercise_id));
		
		if(count($chkexer)==2)
		{
			echo 'alreadyadded';
		}
		else 
		{
			$exercises=Exercises::model()->findByPk($exercise_id);
			$imagenumber=$_REQUEST['imagenumber'];
			$printexercise=new PrintExercise();
			$printexercise->user_id=$user_id;
			$printexercise->exercise_id=$exercise_id;
			$printexercise->photo_number=$imagenumber;
			$printexercise->description=$exercises->description;
			$printexercise->save();
			echo $printexercise->print_id;
		}
		
	}
	
	public function actionPrintphotosequence()
	{
		$i=0;
		foreach ($_REQUEST['arr'] as $value) {
			$printexer=PrintExercise::model()->findByPk($value);
			$printexer->serial=$i;
			$printexer->save();
			$i++;
		}
	}
	
	public function actionPrinttemplatephotosequence()
	{
		$i=0;
		foreach ($_REQUEST['arr'] as $value) {
			$printexer=PrintDetail::model()->findByPk($value);
			$printexer->serial=$i;
			$printexer->save();
			$i++;
		}
	}
	
	public function actionPrint()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByAttributes(array('user_id'=>$userid));
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$this->render('print_exercise',array('model'=>$user,'printexercise'=>$printexercise));
	}
	
	public function actionExercisediary()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByAttributes(array('user_id'=>$userid));
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$this->render('exercise_diary',array('model'=>$user,'printexercise'=>$printexercise));
	}
	
	public function actionExercisediarynonlogin()
	{
		$code=$_REQUEST['code'];
		$printmaster=PrintMasterCode::model()->findByAttributes(array('print_code'=>$code));
		$getuser=PrintMaster::model()->findByPk($printmaster->print_master_id);
		$user=Users::model()->findByAttributes(array('user_id'=>$getuser->user_id));
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$getuser->user_id";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$this->render('exercise_diary',array('model'=>$user,'printexercise'=>$printexercise));
	}
	
	public function actionPrintexercisediary(){
		$userid=$_REQUEST['id'];
		$user=Users::model()->findByAttributes(array('user_id'=>$userid));
		
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$this->renderPartial('print_exercise_diary',array('model'=>$user,'printexercise'=>$printexercise));
	}
	
	public function actionEditprintexercise()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByAttributes(array('user_id'=>$userid));
		$printmasterid=$_REQUEST['id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.print_master_id=$printmasterid";
		$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
		$this->render('print_exercise_edit',array('model'=>$user,'printexercise'=>$printexercise));
		//print_r($printexercise[0]->printDetails);
	}
	
	public function actionUpdateprintexercise()
	{
		$id=$_REQUEST['id'];
		$description=$_REQUEST['description'];
		$perform=$_REQUEST['perform'];
		$times=$_REQUEST['times'];
		$set=$_REQUEST['set'];
		$reps=$_REQUEST['reps'];
		$hold=$_REQUEST['hold'];
		$printexercise=PrintExercise::model()->findByPk($id);
		$printexercise->perform=$perform;
		$printexercise->times=$times;
		$printexercise->complete_set=$set;
		$printexercise->reps=$reps;
		$printexercise->hold=$hold;
		$printexercise->description=$description;
		$printexercise->save();
		//print_r($printexercise);
	}
	
	public function actionEditprintexerciseajax()
	{
		$id=$_REQUEST['id'];
		$description=$_REQUEST['description'];
		$perform=$_REQUEST['perform'];
		$times=$_REQUEST['times'];
		$set=$_REQUEST['set'];
		$reps=$_REQUEST['reps'];
		$hold=$_REQUEST['hold'];
		$printexercise=PrintDetail::model()->findByPk($id);
		$printexercise->perform=$perform;
		$printexercise->times=$times;
		$printexercise->complete_set=$set;
		$printexercise->reps=$reps;
		$printexercise->hold=$hold;
		$printexercise->description=$description;
		$printexercise->save();
		//print_r($printexercise);
	}
	
	public function actionUpdateprintmasternameajax()
	{
		$id=$_REQUEST['print_master_id'];
		$name=$_REQUEST['print_master_name'];
		$printmaster=PrintMaster::model()->findByPk($id);
		$printmaster->print_master_name=$name;
		$printmaster->save();
	}
	public function actionDeleteprintexercise()
	{
		$exerciseid=$_REQUEST['print_id'];
		PrintExercise::model()->findByPk($exerciseid)->delete();
	}
	
	public function actionDeleteprintexercisetemplate()
	{
		$exerciseid=$_REQUEST['print_id'];
		PrintDetail::model()->findByPk($exerciseid)->delete();
	}
	
	public function actionResetprintexercise()
	{
		$id=$_REQUEST['id'];
		$exerid=$_REQUEST['exerid'];
		$exercise=Exercises::model()->findByPk($exerid);
		
		$print=PrintExercise::model()->findByPk($id);
		$print->description=$exercise->description;
		$print->save();
		echo $exercise->description;
	}
	
	public function actionResetprintexercisetemplate()
	{
		$id=$_REQUEST['id'];
		$exerid=$_REQUEST['exerid'];
		$exercise=Exercises::model()->findByPk($exerid);
		$print=PrintDetail::model()->findByPk($id);
		$print->description=$exercise->description;
		$print->save();
		echo $exercise->description;
	}
	
	public function actionDeleteallprintexercisebyuser()
	{
		$userid=Yii::app()->session['user_id'];
		PrintExercise::model()->deleteAllByAttributes(array('user_id'=>$userid));
				
	}
	
	public function actionCreatepdf($type){
		$generatepad=new GeneratePdf();
		$code=$_REQUEST['ecd'];
		$typearr=$type;
		
		switch ($typearr) {
			case 'selected':
			$generatepad->Selected($code);
			break;
			
			case 'single':
			$generatepad->Single($code);
			break;
			
			case 'multiple':
			$generatepad->Multiple($code);
			break;
			
			
		}
		//$this->render('pdfprint',array('type'=>$typearr));
		//echo $typearr;
	
    }
    
    public function actionCreatepdfedittemplate()
    {
    	$customerlogo='';
    	$profilepic='';
    	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase','autoload'));
 
        // set document information
        $pdf->SetCreator(PDF_CREATOR);  

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(30);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('dejavusans', '', 10, '', true);
        $pdf->AddPage();
 		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 		$printmasterid=$_REQUEST['id'];
		
 		
        $criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.print_master_id=$printmasterid";
		$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
		$today=date("m/d/Y",strtotime($printexercise[0]->print_date));
		$code=$printexercise[0]->print_code;
		$user=Users::model()->findByPk($printexercise[0]->user_id);
		
    	if($user->customer_logo!=''){
				$customerlogo='<img src="upload/customerlogo/thumb/'.$user->customer_logo.'" alt="test alt attribute"  border="0" />';
			}else{
				$customerlogo='<img src="images/HEP-01.png" alt="test alt attribute"  border="0" />';
			}
			if($user->profile_picture!=''){
				$profilepic='<img src="upload/profile/thumb/'.$user->profile_picture.'" alt="test alt attribute"  border="0" height="121px"/>';
			}else{
				$profilepic='';
			}
			
		 $tbl = <<<EOD
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 0.5 px solid;border-bottom-color:blue;color:#6789AF">
    <tr>
        <td style="width:15%">$customerlogo</td>
        <td style="width:2%">&nbsp;</td>
        <td style="width:70%;valign:bottom;">
			<table cellspacing="0" cellpadding="1" border="0">
			<tr>
				<td style="font-weight: bold;font-size:20px;text-align:center">Home  Exercise Program</td>
			</tr>
			<tr>
				<td style="font-size:12px;text-align:center">Created By $user->first_name $today</td>
			</tr>
			<tr>
				<td style="font-size:10px;font-style: italic;text-align:center">http://hep4all.com/customhep  Code: $code</td>
			</tr>
			</table>      
        </td>
        <td style="width:15%">$profilepic</td>
    </tr>
    
  </table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$excounter=0;
$i=0;
 $j=1;
$bottommorder='';
        //Write the html
        foreach ($printexercise[0]->printDetails as $value) {
        	$excounter+=1;
        	$title=$value->exercise->exercise_title;
        	//$pdf->SetXY(110, 200);
			//$img=$pdf->Image('images/HEP-01.png', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			if($value->photo_number==1)
			{
				$img=$value->exercise->picture_1;
			}
			else 
			{
				$img=$value->exercise->picture_2;
			}
        if(count($printexercise)==$j)
			{
				$bottommorder='';
			}
			else 
			{
			if($j%3==0)
			{
				$bottommorder='';
			}
			else {
				$bottommorder='style="border-bottom: 1px thin;border-bottom-color:#6789AF;"';
			
			}
			}
       $tbl = <<<EOD
	<table cellspacing="0" cellpadding="1" border="0" $bottommorder>
	<tr>
	<td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
    <tr style=" border-bottom:1px solid #6789AF;">
        <td style="width:3%">$excounter.</td>
       <td style="width:40%"><img src="upload/exercise/image/$img" alt="test alt attribute"  border="0"  /></td>
       <td style="width:2%;">&nbsp;</td>
        <td style="width:28%;" valign="top"><div style="font-weight:bold;">$title</div>
	   <br>
       <div>$value->description</div>
        </td>
        <td style="width:30%">
        	<table cellspacing="0" cellpadding="1" border="0">
   			<tr>
   				<td>Perform </td>
		        <td> $value->perform</td>
		   </tr>
		   <tr>
		   		<td>Time(s) </td>
		        <td> $value->times</td>
		   </tr>   
		   <tr>  
		   		<td>Complete </td>
		        <td> $value->complete_set</td>
		    </tr> 
		    <tr>  
		    	<td>Reps </td>
		        <td> $value->reps</td>
		    </tr>
		    <tr>
		    	<td>Hold </td>
		        <td> $value->hold</td>
    		</tr>
  		</table>
        </td>
    </tr>
    <tr>
    <td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
   
  </table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
        $i++;
 if($i%3==0)
{
	if($i!=count($printexercise))
	{
		$pdf->AddPage();
	}
}
        }
 
       
 
        //Close and output PDF document
        $pdf->Output('filename.pdf', 'I');
        Yii::app()->end();
    }
    
public function actionCreatepdftemplate(){
	
	$customerlogo='';
 		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase','autoload'));
 
        // set document information
        $pdf->SetCreator(PDF_CREATOR);  

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(30);
	$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('dejavusans', '', 10, '', true);
        $pdf->AddPage();
 		//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 		$printmasterid=Yii::app()->session['print_master_id'];
		$code=Yii::app()->session['print_code'];
 		
        $criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.print_master_id=$printmasterid";
		$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
		$today=date("m/d/Y",strtotime($printexercise[0]->print_date));
		$user=Users::model()->findByPk($printexercise[0]->user_id);
		
if(		$user->customer_logo!=''){
				$customerlogo='<img src="upload/customerlogo/thumb/'.$user->customer_logo.'" alt="test alt attribute"  border="0" />';
			}else{
				$customerlogo='<img src="images/HEP-01.png" alt="test alt attribute"  border="0" />';
			}
			if($user->profile_picture!=''){
				$profilepic='<img src="upload/profile/thumb/'.$user->profile_picture.'" alt="test alt attribute"  border="0" height="121px"/>';
			}else{
				$profilepic='';
			}
			
		 $tbl = <<<EOD
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 0.5 px solid;border-bottom-color:blue;color:#6789AF">
    <tr>
        <td style="width:15%">$customerlogo</td>
        <td style="width:2%">&nbsp;</td>
        <td style="width:70%;valign:bottom;">
			<table cellspacing="0" cellpadding="1" border="0">
			<tr>
				<td style="font-weight: bold;font-size:16px;text-align:center">Home  Exercise Program</td>
			</tr>
			<tr>
				<td style="font-size:10px;text-align:center">Created By $user->first_name $today</td>
			</tr>
			<tr>
				<td style="font-size:8px;font-style: italic;text-align:center">http://hep4all.com/customhep  Code: $code</td>
			</tr>
			</table>      
        </td>
         <td style="width:15%">$profilepic</td>
    </tr>
    
  </table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
	$excounter=0;
        //Write the html
        $i=0;
        $j=1;
        $bottommorder='';
        foreach ($printexercise[0]->printDetails as $value) {
        	$excounter+=1;
        	//$pdf->SetXY(110, 200);
			//$img=$pdf->Image('images/HEP-01.png', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			$title=$value->exercise->exercise_title;
			if($value->photo_number==1)
			{
				$img=$value->exercise->picture_1;
			}
			else 
			{
				$img=$value->exercise->picture_2;
			}
			
        if(count($printexercise[0]->printDetails)==$j)
			{
				$bottommorder='';
			}
			else 
			{
			if($j%3==0)
			{
				$bottommorder='';
			}
			else {
				$bottommorder='style="border-bottom: 1 px thin;border-bottom-color:#6789AF;"';
			
			}
			}
			
       $tbl = <<<EOD
	<table cellspacing="0" cellpadding="1" border="0" $bottommorder>
	<tr>
	<td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
    <tr>
        <td style="width:3%">$excounter.</td>
        <td style="width:40%"><img src="upload/exercise/image/$img" alt="test alt attribute"  border="0" /></td>
        <td style="width:2%;">&nbsp;</td>
       <td style="width:28%;" valign="top"><div style="font-weight:bold;">$title</div>
       <br>
       <div>$value->description</div>
        </td>
        <td>
        	<table cellspacing="0" cellpadding="1" border="0">
   			<tr>
   				<td>Perform </td>
		        <td> $value->perform</td>
		   </tr>
		   <tr>
		   		<td>Time(s) </td>
		        <td> $value->times</td>
		   </tr>   
		   <tr>  
		   		<td>Complete </td>
		        <td> $value->complete_set</td>
		    </tr> 
		    <tr>  
		    	<td>Reps </td>
		        <td> $value->reps</td>
		    </tr>
		    <tr>
		    	<td>Hold </td>
		        <td> $value->hold</td>
    		</tr>
  		</table>
        </td>
    </tr>
   <tr>
   <td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
  </table>
EOD;

$j++;
$pdf->writeHTML($tbl, true, false, false, false, '');
$i++;
 if($i%3==0)
{
	if($i!=count($printexercise[0]->printDetails))
	{
		$pdf->AddPage();
	}
	
}


        }
 
        //Close and output PDF document
        
        $pdf->Output('filename.pdf', 'I');
      
        Yii::app()->end();
    }
    
    
public function actionReusetemplate(){
	
	$customerlogo='';
 		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase','autoload'));
 
        // set document information
        $pdf->SetCreator(PDF_CREATOR);  

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(30);
	$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('dejavusans', '', 10, '', true);
        $pdf->AddPage();
 		//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 		$printmasterid=$_REQUEST['id'];
		$printmastercode=PrintMasterCode::model()->findByAttributes(array('print_master_id'=>$printmasterid));
		
 		$code=$printmastercode->print_code;
        $criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.print_master_id=$printmasterid";
		$printexercise=PrintMaster::model()->with('printDetails')->findAll($criteria);
		
		
		$today=date("m/d/Y",strtotime($printexercise[0]->print_date));
		$user=Users::model()->findByPk($printexercise[0]->user_id);
		
if(		$user->customer_logo!=''){
				$customerlogo='<img src="upload/customerlogo/thumb/'.$user->customer_logo.'" alt="test alt attribute"  border="0" />';
			}else{
				$customerlogo='<img src="images/HEP-01.png" alt="test alt attribute"  border="0" />';
			}
			if($user->profile_picture!=''){
				$profilepic='<img src="upload/profile/thumb/'.$user->profile_picture.'" alt="test alt attribute"  border="0" height="121px"/>';
			}else{
				$profilepic='';
			}
			
		 $tbl = <<<EOD
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 0.5 px solid;border-bottom-color:blue;color:#6789AF">
    <tr>
        <td style="width:15%">$customerlogo</td>
        <td style="width:2%">&nbsp;</td>
        <td style="width:70%;valign:bottom;">
			<table cellspacing="0" cellpadding="1" border="0">
			<tr>
				<td style="font-weight: bold;font-size:16px;text-align:center">Home  Exercise Program</td>
			</tr>
			<tr>
				<td style="font-size:10px;text-align:center">Created By $user->first_name $today</td>
			</tr>
			<tr>
				<td style="font-size:8px;font-style: italic;text-align:center">http://hep4all.com/customhep  Code: $code</td>
			</tr>
			</table>      
        </td>
         <td style="width:15%">$profilepic</td>
    </tr>
    
  </table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
	$excounter=0;
        //Write the html
        $i=0;
        $j=1;
        $bottommorder='';
        foreach ($printexercise[0]->printDetails as $value) {
        	$excounter+=1;
        	//$pdf->SetXY(110, 200);
			//$img=$pdf->Image('images/HEP-01.png', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
			$title=$value->exercise->exercise_title;
			if($value->photo_number==1)
			{
				$img=$value->exercise->picture_1;
			}
			else 
			{
				$img=$value->exercise->picture_2;
			}
			
        if(count($printexercise[0]->printDetails)==$j)
			{
				$bottommorder='';
			}
			else 
			{
			if($j%3==0)
			{
				$bottommorder='';
			}
			else {
				$bottommorder='style="border-bottom: 1 px thin;border-bottom-color:#6789AF;"';
			
			}
			}
			
       $tbl = <<<EOD
	<table cellspacing="0" cellpadding="1" border="0" $bottommorder>
	<tr>
	<td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
    <tr>
        <td style="width:3%">$excounter.</td>
        <td style="width:40%"><img src="upload/exercise/image/$img" alt="test alt attribute"  border="0" /></td>
        <td style="width:2%;">&nbsp;</td>
       <td style="width:28%;" valign="top"><div style="font-weight:bold;">$title</div>
       <br>
       <div>$value->description</div>
        </td>
        <td>
        	<table cellspacing="0" cellpadding="1" border="0">
   			<tr>
   				<td>Perform </td>
		        <td> $value->perform</td>
		   </tr>
		   <tr>
		   		<td>Time(s) </td>
		        <td> $value->times</td>
		   </tr>   
		   <tr>  
		   		<td>Complete </td>
		        <td> $value->complete_set</td>
		    </tr> 
		    <tr>  
		    	<td>Reps </td>
		        <td> $value->reps</td>
		    </tr>
		    <tr>
		    	<td>Hold </td>
		        <td> $value->hold</td>
    		</tr>
  		</table>
        </td>
    </tr>
   <tr>
   <td></td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   	<td>&nbsp;</td>
   </tr>
  </table>
EOD;

$j++;
$pdf->writeHTML($tbl, true, false, false, false, '');
$i++;
 if($i%3==0)
{
	if($i!=count($printexercise[0]->printDetails))
	{
		$pdf->AddPage();
	}
	
}


        }
 
        //Close and output PDF document
        
        $pdf->Output('filename.pdf', 'I');
      
        Yii::app()->end();
    }
    
    public function PdfContent()
    {
    	$content="<table width='100%' cellpadding='0' cellspacing='0' border='1'>";
    	$userid=Yii::app()->session['user_id'];
		
		
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		foreach ($printexercise as $value) {
			$content+="<tr><td>"+$value->times+"</td><td>"+$value->hold+"</td></tr>";
 		}
		$content+="</table>";
		
    	return $content;
    }
}
