<?php

class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, 3306, $socket);
        $this->set_charset($charset);
        $this->connect($host, $user, $pass, $db, 3306, $socket);
    }
}
function db_connect()
{
    $dbopts = parse_url(getenv('DATABASE_URL'));

    return new DB(
        'us-cdbr-east-03.cleardb.com',
        'b1be912b1df6a8',
        '507f8e59',
        'heroku_85e4eb877a354da',
        3306,
        null,
        'utf8mb4'
    );
}
