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

    public function setNewCurrency($currencyId, $currency, $intervalBg, $intervalEnd, $time ) {
        $this->params = array(
                 'arg0' => $currencyId,
                 'arg1' => $currency,
                 'arg2' => $intervalBg,
                 'arg3' => $intervalEnd,
                 'arg4' => $time
                );
        $this->soapClient->startCurrencyGenerator($this->params);
    }

    public function getLastValue( $currencyId ) {
        $this->params = array(
            'arg0' => $currencyId
        );
        $res = $this->soapClient->getLastValue($this->params);
        return $res->return;
    }

    public function getAllValues( $currencyId ) {
        $this->params = array(
            'arg0' => $currencyId
        );
        $res = $this->soapClient->getAllValues($this->params);
        return $res->return;
    }

    public function getAllLastValues( $idArray ) {
        $this->params = array(
            'arg0' => $idArray
        );
        $res = $this->soapClient->getAllLastValues($this->params);
        print_r($res);
        if( sizeof(get_object_vars($res)) === 0 ) {
            return null;
        } else {
            if( sizeof($res->return) !== sizeof($currencyArray) ) {
                return null;
            } else {
                return $res->return;
            }
        }
    }
}