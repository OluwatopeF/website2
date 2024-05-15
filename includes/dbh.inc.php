<!-- creating as dbh.inc instead of dbh.inc.php could cause problems -->

<?php

// $dsn = "mysql:host=localhost;dbname=test"; 
// OR
$host="localhost";
$dbname="test";
$dbusername = "root";
$dbpassword = "";//if any one has a mac: use root 

try{//php data object(pdo) is usually more flexible 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die( "Connection failed: ". $e->getMessage());
}

// this file is cruical for connecting in php
// Note :There are other ways but this was the simplest i recently found