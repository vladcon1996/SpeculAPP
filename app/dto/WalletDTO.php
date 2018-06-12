<?php

require_once '../app/models/Currency.php';
require_once '../app/models/Wallet.php';
// require_once '../app/services/CurrencyGeneratorService';

class WalletDTO {
    public $currency;
    public $amount;
    public $estimatedAmount;

    public function __construct($userId, $wallet, $currencyGenerator ) {
        $this->currency = Currency::select('name')->where('id','=',$wallet['currencyId'])->first()->name;
        $this->amount = $wallet['amount'];
        if( $this->currency === 'RON') {
            $currencyF = 1;
        } else {
            $currencyF = $currencyGenerator->getLastValue($wallet['currencyId']);  
        }
        $this->estimatedAmount = round($this->amount * $currencyF, 2);
    }
}