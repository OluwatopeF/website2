<?php
declare(strict_types= 1);

function signup_input() {
    
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo'Username';
        echo"<br>";
        echo' <input type="text" name="username"placeholder="Username" value="' . isset($_SESSION["signup_data"]["username"]) .'">';
        echo'First Name';
        echo"<br>";
        echo '<input type="text" name="fname"placeholder="First Name" required>';
        echo'Last Name';
        echo"<br>";
        echo '<input type="text" name="lname"placeholder="Last Name" required>';
        
    } else{
        echo'First Name';
        echo"<br>";
        echo '<input type="text" name="fname"placeholder="First Name" required>';
        echo'Last Name';
        echo"<br>";
        echo '<input type="text" name="lname"placeholder="Last Name" required>';
        echo'Username';
        echo"<br>";
        echo '<input type="text" name="username"placeholder="Username" required>';
    }

    echo'Password';
    echo"<br>";
    echo '<input type="password" name="pwd" placeholder="Password">';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"])
    && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo'E-mail';
        echo"<br>";
        echo' <input type="text" name="email"placeholder="E-mail" value="' . isset($_SESSION["signup_data"]["email"]) .'">';
    } else{
        echo'E-mail';
        echo"<br>";
        echo '<input type="text" name="email"placeholder="E-mail" required>';
    }
}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach( $errors as $error ) {
            echo '<p class="form-error">', $error. '</p>';
        }
        

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && isset($_GET["signup"])==="success") {
        echo '<br>';
        echo '<p class="form-success">Signup success</p>';
    }
}