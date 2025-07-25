<?php 


    $option=$_GET['option'];
    $Buscar=$_GET['Buscar'];


    $bandera = 0;

    $Server="localhost";
    $User="root";
    $Pass="";
    $Base="prueba franco";

    $Connect=mysqli_connect($Server, $User, $Pass, $Base)
     or die ("no se pudo conectar");
    
    $query= "SELECT * FROM personas, barrios, genero WHERE 
    Id_barrio = Barrio_persona and Id_genero = Genero_persona";
                  
     
    $resultado=mysqli_query($Connect,$query);

        echo "<table style=\"border:5px solid grey\">";
        echo "<tr style = \border:2px solid grey\" bgcolor=\"#d5f5ad\">";
        echo "<td> ID </td>";
        echo "<td> Nombre </td>";
    
    
        echo "</tr>";
    
    
    
        while($registro=mysqli_fetch_array($resultado))
            {
                if ($bandera==1)
                {   
                    echo "<tr style = \border:2px solid grey\" bgcolor=\"#01df01\">";
                    echo "<td>".$registro[0]." "."</td>";
                    echo "<td>".$registro[1]." "."</td>";
                    
                    echo "<td><a href=Modificarbarrio.php?ID=".$registro[1].">modificar </a> "."</td>";

                    $bandera=0;
                }  
                    else
                {
                    echo "<tr style = \border:2px solid grey\" bgcolor=\"#d5f5ad\">";
                    echo "<td>".$registro[0]." "."</td>";
                    echo "<td>".$registro[1]." "."</td>";

                    echo "<td><a href=Modificarbarrio.php?ID=".$registro[1].">modificar </a> "."</td>";

                    
                    $bandera=1;
                
                } 
            echo "</tr>";
    
            }
    
            echo "</table>";
    
        mysqli_close($Connect);
    
    
    
       
?>