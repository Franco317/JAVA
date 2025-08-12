<?php

$bandera = 0;

$Server="localhost";
$Base="biblioteca";
$User="root" ;
$Pass="" ;

$Connect=mysqli_connect($Server, $User ,$Pass , $Base)
or die ("no hubo conexion");

//parte nueva que se coneccta con el  html

  

 $query="SELECT* FROM autores, libros , prestamos  WHERE 
 Id_libro = Libro_id and Id_autor = Autor_libro  ";
 $resultado=mysqli_query($Connect,$query);

 echo"<table style=\border:5px solid grey\">";
 echo "<tr style=\"border:2px solid light-blue\">";
 echo"<td> ID </td>";
 echo"<td> Titulo </td>";
 echo"<td> Autor </td>";
 echo"<td> ISBN </td>";
 echo"<td> Genero </td>";
 echo"<td> Editorial </td>";
 echo"<td> Fecha de nacimmiento autor </td>";
 echo"<td> Nombre Usuario </td>";
 echo"<td> Acciones </td>";
  //corregir esto
 
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
         echo "<td>".$registro[6]." "."</td>";
         echo "<td>".$registro[7]." "."</td>";
         echo "<td>".$registro[12]." "."</td>";
         echo "<td>".$registro[14]." "."</td>";
         echo "<td>".$registro[9]." "."</td>";
         echo "<td>".$registro[10]." "."</td>";
         
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
         echo "<td>".$registro[6]." "."</td>";
         echo "<td>".$registro[7]." "."</td>";
         echo "<td>".$registro[12]." "."</td>";
         echo "<td>".$registro[14]." "."</td>";
         echo "<td>".$registro[9]." "."</td>";
         echo "<td>".$registro[10]." "."</td>";
         
         $bandera=1;
     
     } 
 echo "</tr>";

 }

 echo "</table>";

mysqli_close($Connect);
?>