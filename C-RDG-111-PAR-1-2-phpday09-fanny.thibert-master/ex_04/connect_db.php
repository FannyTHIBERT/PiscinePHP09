<?php
const ERROR_LOG_FILE = "errors.log";
function connect_db($host, $username, $passwd, $port, $db)
{
    //if($host!==null && $username!==null && $passwd!==null && $port!==null && $db!==null)
    try
    {
        $dsn = "mysql:dbname=" . $db . ";host=" . $host . ";port=" . $port;
        $connection = new PDO($dsn, $username, $passwd);
        echo "Connection to DB successful\n";
        return $connection;
    }
    catch(PDOException $error) 
    {
        echo "PDO ERROR: <" . $error . "> storage in <" . ERROR_LOG_FILE . ">\n" . "Error connection to DB\n";
        file_put_contents(ERROR_LOG_FILE, $error);
    }
}

    if(strlen(isset($argv[1],$argv[2], $argv[3],$argv[4],$argv[5]))!==0)
    {
        connect_db($argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
    }
    else
    {
        echo "Bad params! Usage: php connect_db.php host username password port db\n";
    }

//php connect_db.php localhost fanny 31051979 3306 gecko