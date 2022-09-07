<?php

if(isset($_POST["submit"]))
{
    //Preluarea datelor
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    //Instantiere LoginContr class

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    //Rulare erori handlers si user login

    $login->loginUser();

    //Inapoi catre pagina principala

    header("location: ../minions_battle.php?error=none");
}