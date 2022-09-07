<?php

if(isset($_POST["submit"]))
{
    //Preluarea datelor
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    //Instantiere SignupContr class

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //Rulare erori handlers si user signup

    $signup->signupUser();


    //Inapoi catre pagina principala

    header("location: ../signup.php?error=none");
}