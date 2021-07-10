<?php
define('SERVER_NAME','127.0.0.1');
define('DB_NAME','todo_app');
define('USERNAME','root');
define('PASSWORD','@querries');
define('CHARACTER_SET','utf8mb4');

try{
    $dsn= ('mysql:host='.SERVER_NAME.';dbname='.DB_NAME.
                            ';Char_set'.CHARACTER_SET.'');
    $Con= new PDO($dsn, USERNAME, PASSWORD);
    
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo 'Connection Success!';

}catch(PDOException $ex){

    echo('Error in connection'. $ex->getMessage());
}

?>