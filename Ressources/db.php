<?php

class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, $port, $socket);
        $this->set_charset($charset);
        $this->connect('eu-cdbr-west-01.cleardb.com', 'bb8efa8242d022', '93bb7911', 'heroku_12df655ed8c16fe', 3306, null);
    }
}
function db_connect()
{
    return new DB('eu-cdbr-west-01.cleardb.com', 'bb8efa8242d022', '93bb7911', 'heroku_12df655ed8c16fe', 3306, null, 'utf8mb4');
}
