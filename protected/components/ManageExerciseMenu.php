<?php
class ManageExerciseMenu extends CApplicationComponent
{
public function getCategoryNameByCategory($categoryname)
{
	$categoryid=0;
	switch ($categoryname)
		{
			case 'Ankle-and-Foot':
				$categoryid=1;
				break;
				case 'Cervical':
					$categoryid=2;
				break;
				case 'Education':
					$categoryid=3;
				break;
				
				case 'Elbow-and-Hand':
					$categoryid=4;
				break;
				
				case 'Hip-and-Knee':
					$categoryid=5;
				break;
				
				case 'Lumbar-Thoracic':
					$categoryid=6;
				break;
				
				case 'Shoulder':
					$categoryid=7;
				break;
				
				case 'Special':
					$categoryid=8;
				break;
		}
		
		return $categoryid;
		
}

public function getPositionIdByPositionName($positionname)
{
	$positionid=0;
switch ($positionname)
		{
			case 'Prone':
				$positionid=2;
				break;
				case 'Side-Lying':
					$positionid=4;
				break;
				case 'Standing':
					$positionid=6;
				break;
				
				case 'Kneeling':
					$positionid=1;
				break;
				
				case 'Quadruped':
					$positionid=3;
				break;
				
				case 'Sitting':
					$positionid=5;
				break;
				
				case 'Supine':
					$positionid=7;
				break;	
		}
		
		return $positionid;
}
}