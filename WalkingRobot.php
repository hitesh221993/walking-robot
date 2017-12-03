<?php
   
walkingRobot($argv);
	
function walkingRobot($argc) {
	if(count($argc) > 1) {
		$x = (int)$argc[1];
		$y = (int)$argc[2];
		$direction = trim($argc[3]);			
		$walkPath = $argc[4];			
		$direct = -1;
		
		if($direction === "SOUTH") {
			$direct = 2;
		}else if($direction === "NORTH") {
			$direct = 0;
		}else if($direction === "WEST") {
			$direct = 3;
		}else if($direction === "EAST") {
			$direct = 1;
		}		
		walkPathCalculations($x,$y,$direct,$walkPath);
	} else {
		print "Please Insert four arguments: \n";
		print "First argument for X-Coordinate. \n";
		print "Second argument for Y-Coordinate. \n";
		print "Third argument for Direction in CAPS. \n";
		print "Fourth argument for Walking Code. \n";
	}
}

function walkPathCalculations($x,$y, $direction, $path)
{	
	$directionSting = "";
	for($i=0;$i<strlen($path);$i++) {		
		$move = $path[$i];
		if ($move == 'R') {	
			$direction = ( $direction + 1)%4; 			  
			}		      
		  else if ($move == 'L') {
			  $direction = (4 + $direction - 1)%4;	    	     	  
		  }   	  
		 else if ($move == 'W')
		  {
			 if ($direction == 0 )//North	            
			 $y = $y + (int)$path[$i+1];
			 else if ($direction == 1 )//East	            
			 $x = $x + (int)$path[$i+1];
			 else if ($direction == 2 )//South	            
			 $y = $y - (int)$path[$i+1];
			 else if($direction == 3 ) //  West	            
			 $x = $x - (int)$path[$i+1];
		  }
	}

	switch ($direction) {
		case 0:
			$directionSting = "NORTH";
			break;
		case 1:
			$directionSting = "EAST";
			break;
		case 2:
			$directionSting = "SOUTH";
			break;
		case 3:
			$directionSting = "WEST";
			break;
		default:
			$directionSting = "";
	}
	
	print $x . "\n";
	print $y . "\n";
	print $directionSting . "\n";
}
?>