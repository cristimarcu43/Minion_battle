<?php
  include_once 'header.php'
?>

    <section class="signup-form">
        <h2>INREGISTRARE</h2>
        <div class="signup-form-form">
          <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Parola">
            <input type="password" name="pwdrepeat" placeholder="Repeta parola">
            <input type="text" name="email" placeholder="E-mail">
            <br>
            <button type="submit" name="submit">INREGISTRARE</button>
          </form>
        </div>
    </section>

<?php
  include_once 'footer.php'
?>