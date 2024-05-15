<?php 

declare(strict_types= 1);

function get_user(object $pdo, string $username) 
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_pass(object $pdo, string $pwd) 
{
    $query = "SELECT * FROM users WHERE pwd = :pwd;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_bal(object $pdo, string $bal) 
{
    $query = "SELECT bal FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":bal", $bal);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_sav(object $pdo, string $sav) 
{
    $query = "SELECT sav FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":sav", $sav);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_inv(object $pdo, string $inv) 
{
    $query = "SELECT inv FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":inv", $inv);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}