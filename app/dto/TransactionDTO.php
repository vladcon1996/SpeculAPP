<?php

require_once '../app/models/Currency.php';
require_once '../app/models/Transaction.php';

class TransactionDTO {
    
    public $soldamount;
    public $boughtamount;
    public $soldcurrency;
    public $boughtcurrency;
    public $date;

    public function __construct($userId,$transaction) { 
        $this->soldamount = $transaction['soldamount'];
        $this->boughtamount = $transaction['boughtamount'];
        $this->date = $transaction['created_at'];
        $this->soldcurrency = Currency::select('name')->where('id','=',$transaction['soldcurrencyId'])->first()->name;
        $this->boughtcurrency = Currency::select('name')->where('id','=',$transaction['boughtcurrencyId'])->first()->name;
    }
}