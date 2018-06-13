<?php

class UserDTO {
    
    public $username;
    public $estimatedAmount;

    public function __construct($user, $wallet, $array) {
        $this->username = $user['username'];
        $this->estimatedAmount = 0;
        foreach($wallet as $wal) {

            if( $wal['currencyId'] === RON) {
                $this->estimatedAmount += round($wal['amount'], 2);
            } else {
                $this->estimatedAmount += round($array[$wal['currencyId']] * $wal['amount'], 2);
            }
        }
    }
}