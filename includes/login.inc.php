<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = ($_POST["username"]); 
    $pwd = ($_POST["pwd"]);


    // try catch block
    try{
        require_once 'dbh.inc.php';
        require_once 'login_mod.inc.php';
        require_once 'login_ctl.inc.php';

        //Error handlers
        $errors =[];

       if (is_input_empty($username, $pwd)){
        $errors["empty_input"] = "Fill in all fields!";
       }
       
       $result = get_pass($pdo, $pwd);
        
       if(is_username_wrong($result)) {
        $errors["login_incorrect"] = "Incorrect login info: Wrong Username!";
       }
       if (!is_username_wrong($result) && !is_password_wrong($pwd, $result["pwd"])) {
        $errors["login_incorrect"] = "Incorrect login info: Wrong Password!";
       }

        require_once 'config_session.inc.php';

        if ($errors) {
           $_SESSION["errors_login"] = $errors; 

           header ("Location:../index.php");
           die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        // special chars to pickup login id with related info
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["user_bal"] = htmlspecialchars($result["bal"]);
        $_SESSION["user_sav"] = htmlspecialchars($result["sav"]);
        $_SESSION["user_inv"] = htmlspecialchars($result["inv"]);

        $_SESSION["last_regeneration"] = time();

        header("Location:../index.php?login=success");
        $pdo = null;
        $stmt = null;
        
        die();

    }catch(PDOException $e) {
        die("Querry failed: " .$e->getMessage());
    }
}else{
    header("Location:../index.php");
    die();
}