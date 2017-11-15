<?php
require_once 'IConnection.php';

class DatabaseConnection implements IConnection
{
    private $dbName, $dbTable;
    private $uname, $password;
    
    function __construct($dbName, $dbTable, $uname, $password) {
        $this->dbName = $dbName;
        $this->dbTable = $dbTable;
        $this->uname = $uname;
        $this->password = $password;
    }
    
    function __destruct() {
        echo "Destroying the connection...<br>";
    }
    
    public function close() {
        echo "Closing $this->dbName...<br>";
    }
    public function execute($query) {
        echo "Executing query: $query...<br>";
    }
    public function open() {
        echo "Opening $this->dbName...<br>";
    }
}
