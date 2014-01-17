<?php
class Transaction extends Eloquent {

   public static $rules = array();

   public function customer() {
      return $this->belongsTo('Customer');
   }
   
}