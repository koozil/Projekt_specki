<?php

class Database
{
    
    protected static $_instancja;
    protected static $_prefix;
    protected $_mysqli;
    protected $_zapytanie;
    
    protected $host;
    protected $nazwauzytkownik;
    protected $haslo;
    protected $nazwabazadanych;
    protected $port;
    protected $kodowanie;
    
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
            
            if (!is_object($host))
                $this->polaczenie();
            $this->ustawprefix();
            self::$_instance = $this;
        }
    }
    public function ustawprefix()
    {
        self::$_prefix = $prefix;
        return $this;
    }
    
    public function connect()
    {
        if (empty($this->host)) {
            die('Brak ustawień bazy danych.');
        }
        $this->_mysqli = new mysqli($this->host, $this->nazwauzytkownik, $this->haslo, $this->nazwabazadanych, $this->port) or die('Wystąpił problem z połączeniem z bazą danych.');
        if ($this->kodowanie) {
            $this->_mysqli->set_charset($this->kodowanie);
        }
    }
    
    public function zapytanie($zapytanie, $iloscwierszy = null)
    {
        $this->_zapytanie = filter_var($zapytanie, FILTER_SANITIZE_STRING);
        $stmt             = $this->_buildQuery($iloscwierszy);
        $stmt->execute();
        $this->_stmtError = $stmt->error;
        $this->reset();
        return $this->_dynamicBindResults($stmt);
    }
}