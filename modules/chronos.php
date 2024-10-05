<?php

namespace modules;
require_once("day.php");

use Day;

class Chronos{

	/**
	*	@var holidays
	*/
	public $holidays;
	
	public function get_holidays(){
		return $this->holidays;
	}
	
	public function add_holiday($day){
		/**
		*	Adds a holiday to the list
		*	NOTE: valid dates only
		*	
		*	@param Day $day	
		*/
		try{
			$d = \DateTime::createFromFormat("Y-m-d", $day->date_of_day->format("Y-m-d"));
			if ($d->format("Y-m-d") == $day->date_of_day->format("Y-m-d")) $this->holidays[] = $day;
		}
		catch(\Throwable $e){}
	}
	
	public function get_business_days($start_date, $end_date, $region=""){
		/**
		*	Returns the number of business days between two dates
		*	NOTE: we require a valid start and end date
		*	TODO: Calculate business days in a country or region
		*
		*	@param str start_date
		*	@param str end_date
		*	@param str region
		*/
		try{
			$start = new \DateTime($start_date); $end = new \DateTime($end_date);
			if($start->format("Y-m-d") == $start_date && $end->format("Y-m-d") == $end_date){
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
			} else return;
		}
		catch(\Throwable $e){}
	}
	
	public function check_age($birth_date){
		/**
		*	Returns the age of someone in years and days
		*	NOTE: valid dates only, returns nothing if not
		*
		*	#param str birth_of_date
		*/
		try{
			$date_of_birth = new \DateTime($birth_date);
			if ($date_of_birth->format("Y-m-d") == $birth_date){
				$now = new \DateTime();
				$age = $now->diff($date_of_birth);
				$full_year = ($now->format("Y") - $date_of_birth->format("Y") == $age->y) ? $now->format("Y") : $now->format("Y") - 1;
				$last_birthday = new \DateTime($full_year."-".$date_of_birth->format("m")."-".$date_of_birth->format("d"));
				$added_days = $now->diff($last_birthday);
				return $age->y."y-".$added_days->format("%a")."d";
			} else return;
		}
		catch(\Throwable $e){}
	}
	
	public function recurrent_dates($start, $end, $interval=1){
		/**
		*	Returns a list of recurring dates between start and end date
		*	NOTE: we require a valid start and end date
		*
		*	@param str start
		*	@param str end
		*	@param int interval
		*/
		try{
			$start_date = new \DateTime($start);
			$end_date = new \DateTime($end);
			if($start_date->format("Y-m-d") == $start && $end_date->format("Y-m-d") == $end){
				$interval = new \DateInterval("P".$interval."D");
				$period = new \DatePeriod($start_date, $interval, $end_date);
				$output = "";
				foreach($period as $date){
					$output .= $date->format("Y-m-d")."\n";
				}
				return $output;
			} else return;
		}
		catch(\Throwable $e){}
	}

}
?>
