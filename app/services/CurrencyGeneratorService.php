<?php 

define ('WS_URL', 'http://localhost:8887/currency');

class CurrencyGeneratorService {
    
    protected $soapClient;
    protected $params;
    protected $res;

    public function __construct() {
        $this->soapClient = new SoapClient( 'http://localhost:8887/currency?wsdl', // nu furnizam niciun WSDL 
        array('location'	=> WS_URL, // adresa serviciului Web
              'uri'			=> 'http://currencies/', // spatiul de nume corespunzator serviciului Web apelat
              'trace'		=> 1));
    }

    public function setNewCurrency($currency, $intervalBg, $intervalEnd, $time ) {
        $this->params = array(
                 'arg0' => $currency,
                 'arg1' => $intervalBg,
                 'arg2' => $intervalEnd,
                 'arg3' => $time
                );
        $this->soapClient->startCurrencyGenerator($this->params);
    }

    public function getLastValue( $currency ) {
        $this->params = array(
            'arg0' => $currency
        );
        $res = $this->soapClient->getLastValue($this->params);
        return $res->return;
    }

    public function getAllValues( $currency ) {
        $this->params = array(
            'arg0' => $currency
        );
        $res = $this->soapClient->getAllValues($this->params);
        return $res->return;
    }
}