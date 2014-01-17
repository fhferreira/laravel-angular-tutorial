<?php

class Customer extends Eloquent {

	public static $rules = array();

	public function transactions() {
		return $this->hasMany('Transaction');
	}
	
}