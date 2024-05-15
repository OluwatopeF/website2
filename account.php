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

    <title>Signup/Login</title>
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
            <li><a href ="includes/logout.inc.php">Logout</a><li>
        </ul>
                <?php }?>
    </div>

</header>

<p style = "font-size: 35px;">
    <?php
    output_account();
    ?>
</p>
    

<?php
if (!isset($_SESSION["user_id"])) { ?>
    <h3>Login</h3>

    <form action ="includes/login.inc.php" method="post">
        <a>Username</a>
        <input type="text"  name="username"placeholder="Username" required>
        <a>Password</a>
        <input type="password"  name="pwd"placeholder="Password" required>
        <button>Login</button>
    </form>
<?php } ?>

<?php    
check_login_errors();
?>

<br><br>
<?php
if (!isset($_SESSION["user_id"])) { ?>
    <h3>Signup</h3>
    <form action ="includes/signup.inc.php" method="post">
    
    <!-- //match name attribute with name from table -->
    <?php
    signup_input();
    ?>

    <button>Signup</button>
    </form>

    <?php
    check_signup_errors();
    ?>

<?php } ?>

<?php
if (isset($_SESSION["user_id"])) { ?>


    <!-- Add funds -->
    <div>
        <form action ="fund.php" method="post">
            <button>Add funds to account</button>
        </form>
    </div>

    
        <button onclick="hideShow()" id="btn" style="width:20%; color:white; background-color:red; margin: 20px auto;" >Delete Your Account</button>
    
    
    
    <div id="hide" class="hide">
        <form action ="includes/delete_account.inc.php"  method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">    
        <button>Delete</button>
        </form>
    </div>
    


<?php } ?>


<script src="update.js"></script>

</body>

</html>