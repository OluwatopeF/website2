
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){// if request method is equal to post(input from user)
    
    $username = ($_POST["username"]); 
    $pwd = ($_POST["pwd"]);
    $email = ($_POST["email"]);
    //htmlspecialchars can protect from hacks when taking data and outputing
    $fname = ($_POST["fname"]);
    $lname = ($_POST["lname"]);
    
    try{
        require_once "dbh.inc.php";//calling dbh file( can also paste entire file here)
        require_once "signup_mod.inc.php";
        require_once "signup_view.inc.php";
        require_once "signup_ctl.inc.php";

       //Error handlers
       //error array holds errors if one in in array then there is an error
        $errors =[];

       if (input_empty($username, $pwd, $email))
       {
        $errors["empty_input"] = "Fill in all fields!";
       }
       if (email_invalid($email))
        {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (username_taken($pdo, $username) )
        {
            $errors["username_taken"] = "Username already taken!";
        }
        if (email_registered( $pdo, $email))
        {
            $errors["email_registered"] = "Email already taken!";
        }

        
        require_once 'config_session.inc.php';


        if ($errors) {
           $_SESSION["errors_signup"] = $errors; 

           $signupData= [
            "username"=> $username,
            "email"=> $email
           ];

           $_SESSION["signup_data"] = $signupData; 
           header ("Location:../index.php");
           die();
        }

        create_user( $pdo, $username, $pwd, $email, $fname, $lname );  

        
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch(PDOException $e) {//catches the script if it fails and displays it
        die("Query failed: ". $e->getMessage());
    }

}
else{
    header("Location:../index.php"); //using the required parameter is still insecure
    die();
}