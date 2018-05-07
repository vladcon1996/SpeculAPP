<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Currency extends Eloquent {
    protected $table = 'currencies';
    public $timestamps = false;
    protected $fillable = [ 'name' , 'intervalbg', 'intervalend' , 'validitytime' ];
}