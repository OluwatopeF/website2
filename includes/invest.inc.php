<?php
require 'config_session.inc.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])){

    $number = ($_POST["number"]); 
    $user_id = $_SESSION['user_id']; 

    try{
        require_once "dbh.inc.php";
        //take money from balance and send to investments
        $query="UPDATE users SET inv = inv + :number, bal = bal - :number WHERE id = :user_id";


        $stmt = $pdo->prepare(($query));


        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":user_id", $user_id);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("location: ../fund.php");


    }catch(PDOException $e) {
        die("Update failed: " .$e->getMessage());
    }
}else{
    header("location: ../fund.php");
    die();
}