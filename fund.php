<!-- Add required files to keep login session -->
<?php
require_once 'includes/config_session.inc.php';
include 'includes/dbh.inc.php';
require_once 'includes/login_mod.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Bank account</title>
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
    
    <p id="message"></p>
    
    <div class="navbar-profile">
        <?php
            if (isset($_SESSION["user_id"])) { ?>
        <ul>
            <li><a href ="includes/logout.inc.php">Logout</a><li>
        </ul>
                <?php }
                else{ ?>
        <ul>    
            <li><a href ="index.php">Signup</a><li>
        </ul>
<?php }?>
    </div>

</header>

<h1>Add funds to your account</h1>
     <!-- NOTE: actual banking sites should take care of this.
            keep card info in a table then send to bank -->
    <h1>This is just for testing the functionality of the database </h1><br>
    <h1>Log out to check for changes</h1><br><br>



    <!-- show balance in chart -->
    <?php
    // if session = active
        if (isset($_SESSION["user_id"])) {
         ?>

<div class="chartBox" style="display: flex; justify-content:center; align-items: center;  max-width:750px; height:400px; margin: 0 auto; background-color: white; border-radius:20px;">
  
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  let userBal = <?php echo isset($_SESSION["user_bal"]) ? $_SESSION["user_bal"] : 0; ?>;

  let userSav = <?php echo isset($_SESSION["user_sav"]) ? $_SESSION["user_sav"] : 0; ?>;

  let userInv = <?php echo isset($_SESSION["user_inv"]) ? $_SESSION["user_inv"] : 0; ?>;


  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Checking','Saving', 'investments'],
      datasets: [{
        label: 'Ammount',
        data: [userBal, userSav, userInv],
        borderWidth: 1
      }]
    },
    options: {
      
  }
  });
</script>

           

    <?php }?>
    


    

<div id="options" class ="options">
    <br>
    <form id ="formMenu" action ="includes/change_bal.inc.php" method="POST">
        <h1>Add money to checking</h1>
        <input type="number" name="number" placeholder="Ammount"><br>
        <button id = "update">Add</button>
        </form>
    <br>
    
    
    <form  action ="includes/send_sav.inc.php" method="POST">
        <h1>Send to account balance to Saving</h1>
        <input type="number" name="number" placeholder="Ammount"><br>
        <button>Send to savings</button>
        </form>
    <br>

    <form  action ="includes/add_sav.inc.php" method="POST">
        <h1>Add money to saving</h1>
        <input type="number" name="number" placeholder="Ammount"><br>
        <button>Add to savings</button>
        </form>
    <br>

    <form  action ="includes/invest.inc.php" method="POST">
        <h1>Send to account balance to Investments</h1>
        <input type="number" name="number" placeholder="Ammount"><br>
        <button>Send to Investments</button>
        </form>
    <br>
    </div>

    <form action ="account.php" style="margin:35px auto;" method="post">
        <button>Go back</button>
    </form>

</body>
</html>

