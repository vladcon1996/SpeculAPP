<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Currency extends Eloquent {
    protected $table = 'currencies';
    public $timestamps = false;
    protected $fillable = [ 'name' , 'intervalbg', 'intervalend' , 'validitytime' ];

    public function getIds() {
        $currencyArray = Currency::select('id')->get();
        $arr = array();
        for( $i = 0; $i < count($currencyArray); $i++ ) {
            if( $currencyArray[$i]->id !== RON ) {
                array_push($arr,$currencyArray[$i]->id);
            }
        }
        return $arr;
    }
}