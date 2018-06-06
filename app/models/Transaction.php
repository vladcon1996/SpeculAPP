<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Transaction extends Eloquent {
    protected $table = 'transactions';
    protected $fillable = ['userId','soldamount','boughtamount','soldcurrencyId','boughtcurrencyId'];
    public function getTransactions($userId) {
        return Transaction::where('userId','=',$userId)
        ->orderBy('created_at','DESC')
        ->get([
                'soldamount',
                'boughtamount',
                'soldcurrencyId',
                'boughtcurrencyId',
                'created_at'
        ]);
    }
}