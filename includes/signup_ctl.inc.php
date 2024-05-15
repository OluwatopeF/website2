<?php

declare(strict_types= 1);
// Note: True means that the input values are not in the database

function input_empty(string $username, string $pwd, string $email){
    if (empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }

}

// FILTER_VALIDATE_EMAIL is a built in vaildation in php
function email_invalid(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }

}

function username_taken(object $pdo,string $username){
    if (get_username($pdo, $username) ){
        return true;
    }
    else{
        return false;
    }

}
function email_registered(object $pdo, string $email)
{
    
        if (get_email($pdo, $email) ){
            return true;
        }
        else{
            return false;
        }

}

function create_user(object $pdo,string $pwd, string $username, string $email, string $fname, string $lname)
{
    set_user($pdo, $pwd, $username, $email, $fname, $lname);

}

