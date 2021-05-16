<?php

class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, $port, $socket);
        $this->set_charset($charset);
        $this->connect('localhost', 'bb8efa8242d022', '93bb7911', 'ecf-banque', 3306, null);
    }
}
function db_connect()
{
    return new DB('localhost', 'bb8efa8242d022', '93bb7911', 'ecf-banque', 3306, null, 'utf8mb4');
}
