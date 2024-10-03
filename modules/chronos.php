<?php

namespace modules;
require_once("day.php");

use Day;

class Chronos{

	public $holidays;
	
	public function get_holidays(){
		return $this->holidays;
	}
	
	public function add_holiday($day){
		/**
		*	Add a holiday
		*	Date (Y-m-d)
		*	Name
		*	Regions (if not provided, holiday is observed nationwide)
		*/
		$this->holidays[] = $day;
	}
	
	public function get_business_days($start_date, $end_date, $region=""){
		$start = new \DateTime($start_date); $end = new \DateTime($end_date);
		$str = "Business days between ".$start->format("d-m-Y")." and ".$end->format("d-m-Y").": ";
		$business_days = 0;
		while($start <= $end){
			$day_of_week = $start->format("N");	$search = $start->format("Y-m-d");
			$filtered_array = array_filter($this->holidays, function($item) use ($search){
				return $item->date_of_day->format("Y-m-d") == $search;
			});
			$business_days = ($day_of_week < 6 && count($filtered_array) < 1) ? ++$business_days : $business_days;
			$start->add(new \DateInterval("P1D"));
		}
		return $str.$business_days;
	}
	
	public function check_age($birth_date){
		$date_of_birth = new \DateTime($birth_date);
		$now = new \DateTime();
		$age = $now->diff($date_of_birth);
		$full_year = ($now->format("Y") - $date_of_birth->format("Y") == $age->y) ? $now->format("Y") : $now->format("Y") - 1;
		$last_birthday = new \DateTime($full_year."-".$date_of_birth->format("m")."-".$date_of_birth->format("d"));
		$added_days = $now->diff($last_birthday);
		return $age->y."y-".$added_days->format("%a")."d";
	}
	
	public function recurrent_dates($start, $end, $interval=1){
		$start_date = new \DateTime($start);
		$end_date = new \DateTime($end);
		$interval = new \DateInterval("P".$interval."D");
		$period = new \DatePeriod($start_date, $interval, $end_date);
		$output = "";
		foreach($period as $date){
			$output .= $date->format("Y-m-d")."\n";
		}
		return $output;
	}

}
?>
