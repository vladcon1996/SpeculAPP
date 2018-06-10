<?php


class Value {
    public $y;

    public function __construct($value) {
        $this->y = $value;
    }
}

class CurrencyDTO {
    
    public $currencyName;
    public $intervalBegin;
    public $intervalEnd;
    public $time;
    public $values = array();

    public function __construct( $currency, $currencyGenerator ) {
        $this->currencyName = $currency['name'];
        $this->intervalBegin = $currency['intervalbg'];
        $this->intervalEnd = $currency['intervalend'];
        $this->time = $currency['validitytime'];

        $values = $currencyGenerator->getAllValues($this->currencyName); 
        foreach( $values as $value ) {
            array_push($this->values, new Value($value));
        }
    }
}