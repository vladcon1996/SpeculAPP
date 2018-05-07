<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Transaction extends Eloquent {
    protected $table = 'transactions';
    protected $fillable = ['username','soldamount','boughtamount','soldcurrency','boughtcurrency'];
}