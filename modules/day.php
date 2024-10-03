<?php
namespace modules;

class Day{

	public $date_of_day;
	public $name;
	public $regions = [];
	
	public function __construct($date, $name, $regions=null){
		$this->date_of_day = new \DateTime($date);
		$this->name = $name;
		$this->regions = is_array($regions) ? $regions : [];
	}
	
}
