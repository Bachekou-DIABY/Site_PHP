<?php

function sqlite_open($location, $mode)
{
    return new SQLite3($location);
}
function sqlite_query($dbhandle, $query)
{
    $array['dbhandle'] = $dbhandle;
    $array['query'] = $query;

    return $dbhandle->query($query);
}
function sqlite_fetch_array(&$result, $type)
{
    //Get Columns
    $i = 0;
    while ($result->columnName($i)) {
        $columns[] = $result->columnName($i);
        ++$i;
    }

    $resx = $result->fetchArray(SQLITE3_ASSOC);

    return $resx;
}
