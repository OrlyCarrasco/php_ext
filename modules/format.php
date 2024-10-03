<?php

namespace modules;

class Format{

	public function local_currency($value, $currency, $language){
		$fmt = new \NumberFormatter($language, \NumberFormatter::CURRENCY);
		$fmt->setAttribute(\NumberFormatter::PADDING_POSITION, \NumberFormatter::PAD_AFTER_PREFIX);
		$fmt->setAttribute(\NumberFormatter::FORMAT_WIDTH, 15);
		$fmt->setTextAttribute(\NumberFormatter::PADDING_CHARACTER, ' ');
		return $fmt->formatCurrency($value,$currency);
	}
	
	public function local_date($value, $language, $extended=false){
		$date = new \DateTime($value);
		$text = $extended ? \IntlDateFormatter::formatObject($date, \IntlDateFormatter::FULL, $language) : \IntlDateFormatter::formatObject($date, \IntlDateFormatter::SHORT, $language);
		return $text;
	}
	
}
