<?php
  include_once 'header.php'
?>

    <section class="signup-form">
        <h2>CONECTARE</h2>
        <div class="signup-form-form">
          <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password...">
            <br>
            <button type="submit" name="submit">CONECTARE</button>
          </form>
        </div>
    </section>

<?php
  include_once 'footer.php'
?>