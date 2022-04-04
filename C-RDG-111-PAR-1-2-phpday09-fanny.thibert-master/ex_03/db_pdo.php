<?php
const ERROR_LOG_FILE = "error_log_file.log";
function connect_db($host, $username, $passwd, $port, $db)
{
    try
    {
        $dsn = "mysql:dbname=" . $db . ";host=" . $host . ";port=" . $port;
        $connection = new PDO($dsn, $username, $passwd);
        return $connection;
    }
    catch(PDOException $error) 
    {
        echo "PDO ERROR: <" . $error . "> storage in <" . ERROR_LOG_FILE . ">\n";
        file_put_contents(ERROR_LOG_FILE, $error);
    }
}
/*connect_db("localhost","", "", 3306, "gecko");*/
    
    
    