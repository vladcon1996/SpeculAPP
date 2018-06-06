<?php

require_once '../app/models/Currency.php';
require_once '../app/models/Wallet.php';

class WalletDTO {
    public $currency;
    public $amount;

    public function __construct($userId, $wallet) {
        $this->currency = Currency::select('name')->where('id','=',$wallet['currencyId'])->first()->name;
        $this->amount = $wallet['amount']; 
    } 
}