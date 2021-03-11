<?php
use App\Models\ProjectsModel;

function percentage($percentage,$totalValue){
	
	if(!empty($percentage)||$percentage !=0){
		$percantageValue = $percentage/100*$totalValue;
	    return round($totalValue-$percantageValue,2);
	}
	else{
		return $totalValue;
	}
	
}


?>