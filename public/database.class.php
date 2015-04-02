<?php

class Database
{
    
    protected static $_instancja;
    protected static $_prefiks;
    protected $_mysqli;
    protected $_zapytanie;
    
    protected $host;
    protected $nazwauzytkownik;
    protected $haslo;
    protected $nazwabazadanych;
    protected $port;
    protected $kodowanie;
    
    protected $czyzapytanie;
    public $polaczenie;
    
    public function __construct($host = NULL, $nazwauzytkownik = NULL, $haslo = NULL, $nazwabazadanych = NULL, $port = NULL, $kodowanie = 'utf8')
    {
        $czyzapytanie = false;
        if (is_array($host)) {
            foreach ($host as $klucz => $wartosc)
                $$klucz = $wartosc;
        }
        
        if (is_object($host)) {
            $this->_mysqli = $host;
        } else {
            $this->host            = $host;
            $this->nazwauzytkownik = $nazwauzytkownik;
            $this->haslo           = $haslo;
            $this->nazwabazadanych = $nazwabazadanych;
            $this->port            = $port;
            $this->kodowanie       = $kodowanie;
            if ($czyzapytanie) {
                $this->czyzapytanie = true;
                return;
            }
            
            if (!is_object($host))
                $this->polaczenie();
            $this->ustawprefiks();
            self::$_instance = $this;
        }
    }
    public function ustawprefiks()
    {
    }
}