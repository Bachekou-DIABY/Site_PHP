<?php

class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, $port, $socket);
        $this->set_charset($charset);
        $this->connect($host, $user, $pass, $db, $port, $socket);
    }
}
function db_connect()
{
    $dbopts = parse_url(getenv('DATABASE_URL'));

    return new DB(
        $dbopts['host'],
        $dbopts['user'],
        $dbopts['pass'],
        ltrim($dbopts['path'], '/'),
        $dbopts['port'],
        null,
        'utf8mb4'
    );
}
