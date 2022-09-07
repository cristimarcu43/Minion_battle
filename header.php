<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minions battle</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="style_v2.css">
  </head>
  <body>
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
    crossorigin="anonymous">
    </script>

<!---------------------------------------NAVBAR---------------------------------------------->
<header>
  <nav>
      <div>
        <ul class="menu-main">
            <li>Minions Battle</li>
            <li><a href="minions_battle.php">Acasa</a></li>
            <li><a href="descrierejoc.php">Despre joc</a></li>
            <li><a href="#">Istoria bataliilor</a></li>

          <?php
              if(isset($_SESSION["userid"]))
              {
          ?>

                <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                <li><a href="includes/logout.inc.php" class="header-login-a">DECONECTARE</a></li>
          <?php
              }
              else
              {
          ?>

              <li><a href="signup.php">INREGISTRARE</a><li>
              <li><a href="login.php" class="header-login-a">CONECTARE</a></li>
          <?php
              }
          ?>
        </ul>
      </div>
  </nav>
</header>



    </body>