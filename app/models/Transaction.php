<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Transaction extends Eloquent {
    protected $table = 'transactions';
    protected $fillable = ['username','soldamount','boughtamount','soldcurrency','boughtcurrency'];
    public function getTransactions($username) {
        return Transaction::where('username','=',$username)
        ->orderBy('created_at','DESC')
        ->get([
                'soldamount',
                'boughtamount',
                'soldcurrency',
                'boughtcurrency',
                'created_at'
        ]);
    }
}