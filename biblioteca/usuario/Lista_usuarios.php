<?php // imprime el listado del usuario

$bandera = 0;

$Server="localhost";
$Base="biblioteca";
$User="root" ;
$Pass="" ;

$Connect=mysqli_connect($Server, $User ,$Pass , $Base)
or die ("no hubo conexion");

//parte nueva que se conecta con el  html

  

 $query="SELECT* FROM usuarios WHERE 1";
 $resultado=mysqli_query($Connect,$query);

 echo"<table style=\border:5px solid grey\">";
 echo "<tr style=\"border:2px solid light-blue\">";
 echo"<td> ID </td>";
 echo"<td> Nombre </td>";
 echo"<td> Apellido  </td>";
 echo"<td> FecNac  </td>";
 echo"<td> DNI </td>";
 echo"<td> Barrio </td>";
 echo"<td> Domicilio </td>";
 echo"<td> Telefono </td>";
 echo"<td> Email </td>"; //corregir esto
 
 echo "</tr>";

 while($registro=mysqli_fetch_array($resultado))
 {
     if ($bandera==1)
     {
         echo "<tr style = \border:2px solid grey\" bgcolor=\"#01df01\">";
         echo "<td>".$registro[0]." "."</td>";
         echo "<td>".$registro[1]." "."</td>";
         echo "<td>".$registro[2]." "."</td>";
         echo "<td>".$registro[3]." "."</td>";
         echo "<td>".$registro[4]." "."</td>";
         echo "<td>".$registro[5]." "."</td>";
         echo "<td>".$registro[6]." "."</td>";
         echo "<td>".$registro[7]." "."</td>";
         echo "<td>".$registro[8]." "."</td>";
        
         
         $bandera=0;
     }  
         else
     {
         echo "<tr style = \border:2px solid grey\" bgcolor=\"#d5f5ad\">";
         echo "<td>".$registro[0]." "."</td>";
         echo "<td>".$registro[1]." "."</td>";
         echo "<td>".$registro[2]." "."</td>";
         echo "<td>".$registro[3]." "."</td>";
         echo "<td>".$registro[4]." "."</td>";
         echo "<td>".$registro[5]." "."</td>";
         echo "<td>".$registro[6]." "."</td>";
         echo "<td>".$registro[7]." "."</td>";
         echo "<td>".$registro[8]." "."</td>";
        
         
         $bandera=1;
     
     } 
 echo "</tr>";

 }

 echo "</table>";

mysqli_close($Connect);
?>