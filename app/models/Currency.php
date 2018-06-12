<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Currency extends Eloquent {
    protected $table = 'currencies';
    public $timestamps = false;
    protected $fillable = [ 'name' , 'intervalbg', 'intervalend' , 'validitytime' ];

    public function getIds() {
        $currencyArray = Currency::select('id')->get();
        print_r($currencyArray);
        $arr = array();
        foreach($currencyArray as $currencyId) {
            if( $currencyId->id !== RON ) {
                array_push($arr,$currencyId);
            }
        }
        return $arr;
    }
}