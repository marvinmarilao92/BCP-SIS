<?php
  for ($x = 1; $x <= $_SESSION["radioCount"]; $x++)
  {
      echo ' var value'.$x.'  = $("input[type=radio][name=response'.$x.']:checked").val(); ';
  }
 ?>

 <?php

   for ($x = 1; $x <= $_SESSION["radioCount"]; $x++)
   {
     if ($x == 1)
     {
       echo "  var takeDataintoArray = 'value".$x."='      + value".$x." +";
     }
     if ($x !=1 && $x != $_SESSION["radioCount"])
     {
       echo "'&value".$x."='     + value".$x." +";
     }
     if ($x == $_SESSION["radioCount"]-1)
     {
       echo "'&value".$x." ='     + value".$x.";";
     }
   }
  ?>

 <?php
    for ($x = 1; $x <= $_SESSION["radioCount"]; $x++)
    {
      if ($x == 1)
      {
        echo "  if (value".$x." === undefined ||";
      }
     if ($x !=1 && $x != $_SESSION["radioCount"])
      {
        echo "value".$x." === undefined ||";
      }
      if ($x ===  $_SESSION["radioCount"]-1)
      {
        echo "value".$x." === undefined  || Teacher_Name == '')";
      }
    }
?>
