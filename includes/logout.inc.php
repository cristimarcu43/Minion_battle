<?php

session_start();
session_unset();
session_destroy();

//Inapoi catre pagina principala

header("location: ../minions_battle.php?error=none");