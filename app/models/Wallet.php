<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Wallet extends Eloquent {
    protected $table = 'wallet';
    public $timestamps = false;
    protected $fillable = [ 'currency','username','amount'];
    public function getWallet($username) {
        return Wallet::where('username','=',$username)
            ->get([
                'currency',
                'amount'
            ]);
    }
}