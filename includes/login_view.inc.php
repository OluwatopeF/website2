<?php

declare(strict_types= 1);

function output_account()
{
    if (isset($_SESSION["user_id"])) {
        echo "You are logged in as: " . $_SESSION["user_username"]  ;
        echo "<br>"."Balance: $ " . $_SESSION["user_bal"];
        echo "<br>"."Savings: $ " . $_SESSION["user_sav"];
        echo "<br>"."Investments: $" . $_SESSION["user_inv"];
    } else {
        echo "You are not logged in";
    }
}

function total()
{
    if (isset($_SESSION["user_id"])) {
        echo "Account Total: $ " . $_SESSION["user_sav"]; + $_SESSION["user_bal"]; ;
    }
}

function check_login_errors() 
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error)
        {
            echo '<p class="form-error">' . $error. '</p>';
        }

        unset($_SESSION["errors_login"]);
    }
    else if (isset($get['login']) && $_GET['login'] === "success") {
        echo "<br>";
        echo "Login Sucsess!";
    }
}