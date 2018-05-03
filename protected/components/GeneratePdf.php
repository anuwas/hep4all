<?php

class GeneratePdf extends CApplicationComponent
{
	public function Selected($code)
	{
	$customerlogo='';	
	$profilepic='';
	$today=date('m/d/Y');
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
	$pdf->SetMargins(10, 5, 10);
	$pdf->SetHeaderMargin(30);
	$pdf->SetFooterMargin(10);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, 25);

	// set image scale factor
	//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	        $pdf->SetFont('dejavusans', '', 10, '', true);
	        $pdf->AddPage();
	 		//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	 		$userid=Yii::app()->session['user_id'];
	 		$user=Users::model()->findByPk($userid);
	        $criteria = new CDbCriteria;
			$criteria->order = 'serial ASC';
			$criteria->condition="t.user_id=$userid";
			$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
			
			if($user->customer_logo!=''){
				$customerlogo='<img src="upload/customerlogo/thumb/'.$user->customer_logo.'" alt="test alt attribute"  border="0" />';
			}else{
				$customerlogo='<img src="images/HEP-01.png" alt="test alt attribute"  border="0" />';
			}
			if($user->profile_picture!=''){
				$profilepic='<img src="upload/profile/thumb/'.$user->profile_picture.'" alt="test alt attribute"  border="0" height="121px" />';
			}else{
				$profilepic='';
			}
			
		 $tbl = <<<EOD
		 
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 1 px solid;border-bottom-color:#6789AF;color:#6789AF">
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

        //Write the html
        $excounter=0;
        $i=0;
        $j=1;
        $bottommorder='';
        foreach ($printexercise as $value) {
        	 
        	$title=$value->exercise->exercise_title;
        	$excounter+=1;
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
				$bottommorder='style="border-bottom: 1 px thin;border-bottom-color:#6789AF;"';
			
			}
			}
			
			
       $tbl = <<<EOD
	<table cellspacing="0" cellpadding="0" border="0" $bottommorder>
	<tr>
	<td style="width:2%"></td>
   	<td style="width:30%">&nbsp;</td>
   	
   	<td style="width:42%;">&nbsp;</td>
   	<td style="width:25%">&nbsp;</td>
   </tr>
    <tr>
        <td style="width:2%">$excounter.</td>
        <td style="width:30%" ><img src="upload/exercise/image/$img" alt="test alt attribute"  border="0"  /></td>
        
        <td style="width:42%;vertical-align: top;">
        <table>
        	<tr>
        		<td><b>$title</b></td>
        	</tr>
        	<tr>
        		<td>&nbsp;</td>
        	</tr>
        	<tr>
        		<td style="font-size:9px;">$value->description</td>
        	</tr>
        </table>
        </td>
        <td style="width:25%">
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
   	<td></td>
   	
   	<td></td>
   	<td></td>
   </tr>
   
  </table>
EOD;
$j++;
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
	
	public function Single($code)
	{
	$customerlogo='';		
	$profilepic='';
	$today=date('m/d/Y');
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
	 		$userid=Yii::app()->session['user_id'];
	 		$user=Users::model()->findByPk($userid);
	        $criteria = new CDbCriteria;
			$criteria->order = 'serial ASC';
			$criteria->condition="t.user_id=$userid";
			$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
			
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
		 
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 1 px solid;border-bottom-color:#6789AF;color:#6789AF">
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
        //Write the html
        $i=0;
        $excounter=0;
        foreach ($printexercise as $value) {
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
			
       $tbl = <<<EOD
	<table cellspacing="0" cellpadding="1" border="0">
	
    <tr>
    	
        <td> $excounter.&nbsp;<img src="upload/exercise/image/$img" alt="test alt attribute"  border="0" /></td>
    </tr>
    <tr>
    	<td style="height:50px;">&nbsp;</td>
    </tr>
    <tr>
    	<td>
    		<table width="100%" cellspacing="0" cellpadding="1" border="0">
    			<tr>
    				<td align="left">
       					<table width="100%">
       						<tr>
       							
       							<td style="font-size:10px; font-weight:bold;">$title</td>
       						</tr>
       						<tr>
       							
       							<td></td>
       						</tr>
       						<tr>
       							
       							<td style="font-size:8px;">$value->description</td>
       						</tr>
       					</table>
       				</td>
    				<td align="left" style="font-size:10px;">
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
    		</table>
    	</td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
  </table>
EOD;

//$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->writeHTML($tbl, 0, '', 0, 'C', true, 0, false, false, 0);

$i++;
if($i<count($printexercise))
{
$pdf->AddPage();
}

        }
 
        //Close and output PDF document
        $pdf->Output('filename.pdf', 'I');
        Yii::app()->end();
	}
	
	public function Multiple($code)
	{
	$customerlogo='';	
	$profilepic='';
	$today=date('m/d/Y');
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
	 		$userid=Yii::app()->session['user_id'];
	 		$user=Users::model()->findByPk($userid);
	        $criteria = new CDbCriteria;
			$criteria->order = 'serial ASC';
			$criteria->condition="t.user_id=$userid";
			$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
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
		 
	<table border="0" vertical-align: bottom; cellspacing="0" cellpadding="1" style="border-bottom: 1 px solid;border-bottom-color:#6789AF;color:#6789AF">
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

        //Write the html
        $i=1;
        $excounter=0; 
        $lessexcounter=0;
        foreach ($printexercise as $value) {
        	$extitle=$value->exercise->exercise_title;
        	$excounter+=1;
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
			
     
      	$tblc[$i] = <<<EOD
	<table cellspacing="0" cellpadding="1" border="0" >
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
    	<td width="56%">&nbsp;<br><img src="upload/exercise/image/$img" alt="test alt attribute"  border="0" /></td>
    	<td style="font-size:10px;" width="44%">&nbsp;<br>
      	<table width="100%">
	      	<tr>
	      	<td style="width:2%;"></td>
	      	<td style="width:98%;font-size:10px; font-weight:bold;">$extitle</td>
	      	</tr>
	      	<tr>
	      	<td style="width:2%;"></td>
	      	<td style="width:98%;"></td>
	      	</tr>
	      	<tr>
	      	<td style="width:2%;"></td>
	      	<td style="width:98%;font-size:8px;">$value->description</td>
	      	</tr>
      	</table>
      	</td>
    </tr>
       
    <tr>
    	<td style="font-size:6px;"><table cellspacing="0" cellpadding="1" border="0">
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
  		</table></td>
    	<td></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
   
  </table>
EOD;
     
    
       
	if($i%2==0)
	{
		
		$j=$i-1;
		 	$tbll = <<<EOD
	<table cellspacing="0" cellpadding="0" border="0">
	<tr>
    	<td style="height:100px;width:50%;border: 1px thin #6789AF;">&nbsp;$j.&nbsp;$tblc[$i]</td>
    	<td style="height:100px;width:50%;border: 1px thin #6789AF;">&nbsp;$i.&nbsp;$tblc[$j]</td>
    </tr>
    
  </table>
EOD;
 	$pdf->writeHTML($tbll, true, false, false, false, '');
	if($i%6==0){
		if($i!=count($printexercise))
			{
				$pdf->AddPage();
			}
	}
	}
	else 
	{
		
		if($i==count($printexercise))
		{
			$j=$i-1;
			$tbll = <<<EOD
	<table cellspacing="0" cellpadding="1" border="1">
	<tr>
    	<td style="height:100px;width:50%;border: 1px thin #6789AF;">&nbsp;$i.&nbsp;$tblc[$i]</td>
    	<td style="height:100px;width:50%"></td>
    </tr>
    
  </table>
EOD;
 	$pdf->writeHTML($tbll, true, false, false, false, '');
		if($i%6==0){
			if($i!=count($printexercise))
				{
					$pdf->AddPage();
				}
			}
		}
		
	}


$i++;

        }
        

        //Close and output PDF document
        $pdf->Output('filename.pdf', 'I');
        Yii::app()->end();
	}
}?>
