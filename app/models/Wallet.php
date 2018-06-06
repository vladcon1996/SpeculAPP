<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Wallet extends Eloquent {
    protected $table = 'wallet';
    public $timestamps = false;
    protected $fillable = [ 'currencyId','userId','amount'];
    public function getWallet($userId) {
        return Wallet::where('userId','=',$userId)
            ->get([
                'currencyId',
                'amount'
            ]);
    }
}