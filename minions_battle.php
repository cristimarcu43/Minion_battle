<?php
  include_once 'header.php'
?>
<!------------------------------------------------------------------------------------->
<!---------------------------------------Tim STATS---------------------------------------------->
<div class = "table-one">
    <tr>
        <th>
            <h1>Tim Stats</h1>
        </th>
    </tr>
    <tr>
        <td>
            <p> HP: 70 - 100</p>
            <p> Strength: 70 - 80</p>
            <p> Defense: 45 - 55</p>
            <p> Speed: 40 - 50</p>
            <p> Luck: 10% - 30%</p>
            <h2>Abilitati</h2>
            <p> Banana Strike</p>
            <p> Umbrella Shield</p>
        </td>
    </tr>
</div>
<!---------------------------------------Button "incepe lupta"---------------------------------------------->
<div class="button">
  <form method="post">
      <button type="submit" name="submit">START</button>
  </form>
</div>
<!---------------------------------------Enemy STATS---------------------------------------------->
<div class = "table-two">
    <tr>
        <th>
            <h1>Enemy Stats</h1>
        </th>
    </tr>
    <tr>
        <td>
            <p> HP: 60 - 90</p>
            <p> Strength: 60 - 90</p>
            <p> Defense: 40 - 60</p>
            <p> Speed: 40 - 60</p>
            <p> Luck: 25% - 40%</p>
            <h2>Abilitati</h2>
            <p> Acesta nu are abilitati speciale</p>
        </td>
    </tr>
</div>
<!---------------------------------------Gameplay---------------------------------------------->

<div class = "Batalia">
  <h1>Aici incepe batalia!</h1>
</div>

<div class = "table-three">
    <tr>
        <th>
            <h1>Tim</h1>
        </th>
    </tr>
    <tr>
        <td>
        <?php
            if(isset($_SESSION["userid"]))
            {

            require 'Tim.php';
            $Tim = new Tim(rand(70, 100), rand(70, 80), rand(45, 55), rand(40, 50), rand(10, 30));

            echo "<p> HP: $Tim->health</p>";
            echo "<p> Strength: $Tim->strength</p>";
            echo "<p> Defense: $Tim->defense</p>";
            echo "<p> Speed: $Tim->speed</p>";
            echo "<p> Luck: $Tim->luck</p>";

            }

            else
            {
              echo "<p> Nu esti inca logat</p>";
            }

          ?>
        </td>
    </tr>
</div>

<div class = "table-four">
    <tr>
        <th>
            <h1>Enemy</h1>
        </th>
    </tr>
    <tr>
        <td>
        <?php

            if(isset($_SESSION["userid"]))
            {
            require 'Evil.php';
            $Evil = new Evil(rand(60, 90), rand(60, 90), rand(40, 60), rand(40, 60), rand(25, 40));

            echo "<p> HP: $Evil->health</p>";
            echo "<p> Strength: $Evil->strength</p>";
            echo "<p> Defense: $Evil->defense</p>";
            echo "<p> Speed: $Evil->speed</p>";
            echo "<p> Luck: $Evil->luck</p>";

            }
            else
            {
              echo "<p> Nu esti inca logat</p>";
            }

          ?>
        </td>
    </tr>
</div>
          

<div class = "table-five">
  <tr>
    <th>
      <h1>Rezultatul luptei!</h1>
    </th>
  </tr>
  <tr>
    <td>
        <?php

          if(isset($_POST['submit']))
          {

            
            function BananaStrike()
            {
              $sansa = 10;
              $random = rand(1, 100);
              if($random < $sansa + 1)
              {
                return true;
              }
              else
              {
                return false;
            
              }
            }

            function Umbrella_shield()
            {
              $sansa = 20;
              $random = rand(1, 100);
              if($random < $sansa + 1)
              {
                return true;
              }
              else
              {
                return false;
              }
            }

           function tura_lui_Tim($Tim, $Evil)
            {
              if($Tim->speed > $Evil->speed)
              {
                return 1;
              }
              else if($Tim->speed == $Evil->speed)
              {
                if($Tim->luck >= $Evil->luck)
                {
                  return 1;
                }
              }
              return 0;
            }  

          function Damage($Tim, $Evil, $tura)
          {
            if($tura == 1)
            {
              if(BananaStrike() == true)
              {
                $Dmg = 2*$Tim->strength - $Evil->defense;
                if($Dmg < 0)
                {
                  $Dmg = 0;
                }
                echo "<h2 style=color:yellow;> Tim a folosit Banana strike si a provocat $Dmg. damage</h2>";
              }
              else
              {
                $Dmg = $Tim->strength - $Evil->defense;
              }
            }
            else
            {
              $Dmg = $Evil->strength - $Tim->defense;

              if(Umbrella_shield() == true )
              {
                $Dmg = 0.5*$Evil->strength - $Tim->defense;
                if($Dmg < 0)
                {
                  $Dmg = 0;
                }
                
                echo "<h2 style=color:yellow;> Tim a folosit Umbrella_shield si a primit $Dmg. damage</h2>";
              }
            }
            return $Dmg;
          }

          $runda = 1;
          $tura = tura_lui_Tim($Tim, $Evil);
          while( $Tim->health > 0 && $Evil->health > 0 && $runda < 21)
          {
            echo "<h2 style=color:black;> Atacul $runda:</h2>";
            if($tura == 1)
            {
              echo "<h3 style=color:yellow;> Tim ataca!</h3>";
            $Dmg = Damage($Tim, $Evil, $tura);
            $Evil->health = $Evil->health - $Dmg;
            $tura = !$tura;
            echo "<rev style=font-size:17px; font-weight:bold;> Tim ataca cu: $Dmg .</rev>";
            echo "<br>";

              if($Evil ->health < 0) 
              {
                $Evil ->health = 0;
                echo "<rev style=font-size:17px; font-weight:bold;> Evil health devine: $Evil->health.</rev>";
              }
              else
              {
                echo "<rev style=font-size:17px; font-weight:bold;> Evil health devine: $Evil->health.</rev>";
              }
            }

            elseif ($tura == 0)
            {
              echo "<h3 style=color:purple;> Evil ataca!</h3>";
              $Dmg = Damage($Tim, $Evil, $tura);
              $Tim->health = $Tim->health - $Dmg;
              $tura = !$tura;
              echo "<rev style=font-size:17px; font-weight:bold;> Evil ataca cu: $Dmg .</rev>";
              echo "<br>";
              if($Tim->health < 0)
              {
                $Tim->health = 0;
                echo "<rev style=font-size:17px; font-weight:bold;> Tim health devine: $Tim->health.</rev>";
              }
              else
              {
              echo "<rev style=font-size:17px; font-weight:bold;> Tim health devine: $Tim->health.</rev>";
              } 
              echo "<br>";
            }

            $runda++;
          }
        
            if($Tim->health == 0)
            {
              echo "<h1 style=color:purple;> Castigatorul este EVIL!!!</h1>";
            }
            elseif($Evil->health == 0)
            {
              echo "<h1 style=color:yellow;> Castigatorul este TIM!!!</h1>";
            }
          }


        ?>
        </td>
      </tr>
<?php
  include_once 'footer.php'
?>