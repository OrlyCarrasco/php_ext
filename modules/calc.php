<?php

namespace modules;

class Calc{

	public function nearest($value, $step){
		//	Round up to nearest value that can be divided by step
		return round($value/$step,0)*$step;
	}
	
	public function celsius_to_fahrenheit($value,$show_both=false){
		/*
		*	Convert temperature from Celsius to Fahrenheit
		*	$show_both: if set to true, both scales are used
		*/
		$new_value = ($value*1.8)+32;
		$text = $show_both ? $value."&deg; C / ".$new_value."&deg; F" : $new_value."&deg; F";
		return $text;
	}
	
	public function fahrenheit_to_celsius($value, $show_both){
		/*
		*	Convert temperature from Fahrenheit to Celsius
		*	$show_both: if set to true, both scales are used
		*/
		$new_value = ($value-32)/1.8;
		return $show_both ? $value."&deg; F / ".$new_value."&deg; C" : $new_value."&deg; C";
	}
	
	public function cm_to_feet($value, $show_both=false){
		/*
		*	Convert length from centimeters to feet and nearest quarter inches.
		*	$show_both: if set to true, both scales are used
		*/
		$inches = $value/2.54;
		$feet = intval($inches/12);
		$inches = $this->nearest($inches - ($feet*12), 0.25);
		return $show_both ? $value." cm / ".$feet." ft ".$inches." in" : $feet." ft ".$inches." in";
	}
	
	public function feet_to_cm($value, $show_both=false){
		/*
		*	Convert length from feet to centimeters
		*	$show_both: if set to true, both scales are used
		*/
		$feet = floor($value);
		$inches = ($value-$feet)*12;
		$all_inches = ($feet*12)+$inches;
		$cm = $this->nearest($all_inches*12, 1);
		return $show_both ? $feet." ft ".$inches." in / ".$cm." cm" : $cm." cm";
	}
	
	public function kg_to_pounds($value, $show_both = false){
		/*
		*	Convert length from kilograms to imperial pounds
		*	$show_both: if set to true, both scales are used
		*/
		$pounds = $this->nearest($value/0.45359237, 1);
		return $show_both ? $value." kg / ".$pounds." lbs" : $pounds." lbs";
	}
	
	public function pounds_to_kg($value, $show_both = false){
		/*
		*	Convert length from imperial pounds to kilograms
		*	$show_both: if set to true, both scales are used
		*/
		$kg = $this->nearest($value*0.45359237, 1);
		return $show_both ? $value." lbs / ".$kg." kg" : $kg." kg";
	}
	
	public function acre_to_sqmtr($value, $show_both = false){
		/*
		*	Convert length from acres to square meters
		*	$show_both: if set to true, both scales are used
		*/
		$sqm = $this->nearest($value*4046.8564224, 1);
		return $show_both ? $value." acre / ".$sqm." m&sup2;" : $sqm." m&sup2;";
	}
	
	public function sqmtr_to_acre($value, $show_both = false){
		/*
		*	Convert length from square meters to acres
		*	$show_both: if set to true, both scales are used
		*/
		$acre = $this->nearest($value/4046.8564224, 1);
		return $show_both ? $value." m&sup;2 / ".$acre." acre" : $acre." acre";
	}
	
	public function sqft_to_sqmtr($value, $show_both = false){
		/*
		*	Convert length from square feet to square meters
		*	$show_both: if set to true, both scales are used
		*/
		$sqmeter = $this->nearest($value * (4046.8564224/43560), 0.1);
		return $show_both ? $value." ft&sup2; / ".$sqmeter." m&sup2;" : $sqmeter." m&sup2;";
	}
	
	public function sqmeter_to_sqft($value, $show_both = false){
	/*
		*	Convert length from square meters to square feet
		*	$show_both: if set to true, both scales are used
		*/
		$sqft = $this->nearest($value/(4046.8564224/43560),1);
		return $show_both ? $value." m&sup2; / ".$sqft." ft&sup2;" : $sqft." ft&sup2;";
	}
	
	public function sqmile_to_sqkm($value, $show_both = false){
		/*
		*	Convert length from square miles to square kilometers
		*	$show_both: if set to true, both scales are used
		*/
		$sqkm = $this->nearest($value*2.589988110336,0.1);
		return $show_both ? $value." mile&sup2; / ".$sqkm." km&sup2;" : $sqkm." km&sup2;";
	}
	
	public function sqkm_to_sqmile($value, $show_both = false){
		/*
		*	Convert length from square kilometers to square miles
		*	$show_both: if set to true, both scales are used
		*/
		$sqmile = $this->nearest($value/2.589988110336,0.1);
		return $show_both ? $value." mile&sup2; / ".$sqmile." km&sup2;" : $sqmile." km&sup2;";
	}
	
	public function floz_to_ml($value, $show_both = false){
		/*
		*	Convert length from fluid ounce to milliliters
		*	$show_both: if set to true, both scales are used
		*/
		$ml = $this->nearest($value*28.4130625,1);
		return $show_both ? $value." fl oz / ".$ml." ml" : $ml." ml";
	}

	public function ml_to_floz($value, $show_both = false){
		/*
		*	Convert length from milliliters to fluid ounces
		*	$show_both: if set to true, both scales are used
		*/
		$floz = $this->nearest($value/28.4130625,1);
		return $show_both ? $value." ml / ".$floz." fl oz" : $floz." fl oz";
	}
	
	public function pint_to_liter($value, $show_both = false){
		/*
		*	Convert length from pint to liters
		*	$show_both: if set to true, both scales are used
		*/
		$liter = $this->nearest($value*0.56826125,0.1);
		return $show_both ? $value." pt / ".$liter." liter" : $liter." liter";
	}
	
	public function liter_to_pint($value, $show_both = false){
		/*
		*	Convert length from liters to pints
		*	$show_both: if set to true, both scales are used
		*/
		$pint = $this->nearest($value/0.56826125,0.1);
		return $show_both ? $value." liter / ".$pint." pint" : $pint." pint";
	}
	
	public function gallon_to_liter($value, $show_both = false){
		/*
		*	Convert length from gallons to liters
		*	$show_both: if set to true, both scales are used
		*/
		$liter = $this->nearest($value*4.54371,0.1);
		return $show_both ? $value." gallon / ".$liter." liter" : $liter." liter";
	}
	
	public function liter_to_gallon($value, $show_both = false){
		/*
		*	Convert length from liters to gallons
		*	$show_both: if set to true, both scales are used
		*/
		$gallon = $this->nearest($value/4.54371,0.1);
		return $show_both ? $value." liter / ".$gallon." gallon" : $gallon." gallon";
	}

}
