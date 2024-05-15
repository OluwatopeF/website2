<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Website</title>

</head>

<body>
<header class="header-main">
    <div class = "bsu-logo">
        <img src="includes/img/logo-white.png" alt="BSU">
        <nav class="navbar">
        <ul>
            <li><a href ="index.php">Home</a><li>
            <li><a href ="#">About</a><li>
            
        </ul>
    </nav>
    </div>
    
    
    
    <div class="navbar-profile">
        <?php
            if (isset($_SESSION["user_id"])) { ?>
        <ul>
            <li><a href ="account.php">Account</a><li>
            <li><a href ="includes/logout.inc.php">Logout</a><li>
        </ul>
                <?php }
                else{ ?>
        <ul>    
            <li><a href ="account.php">Signup / Login</a><li>
        </ul>
<?php }?>
    </div>

</header>


<h3 style = "font-weight: bold;">Welcome</h3>
<p style = "font-size: 35px;">
    <?php
    output_account();
    ?>
</p>
    



<?php    
check_login_errors();
?>




</body>

</html>