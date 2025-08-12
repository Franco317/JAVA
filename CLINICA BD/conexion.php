<?php 

    $Server="localhost";
    $User="root";
    $Pass="";
    $Base="clinica";

    $Connect=mysqli_connect($Server, $User, $Pass, $Base)
     or die ("no se pudo conectar");
?>