<?php

class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, $port, $socket);
        $this->set_charset($charset);
        $this->connect('localhost', 'root', 'root', 'ecf-banque', 3306, null);
    }
}
function db_connect()
{
    return new DB('localhost', 'root', 'root', 'ecf-banque', 3306, null, 'utf8mb4');
}
