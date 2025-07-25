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
    


     if ($option == "1")
        {


            $query="SELECT* FROM personas ,barrios ,genero  WHERE 
            Id_barrio= Barrio_persona and Id_genero = Genero_persona 
            and Nombre_persona like '%$Buscar%' order by id_Persona";
        }
        if ($option == "2")
        {
            $query= "SELECT * FROM personas ,barrios ,genero  WHERE 
                    Id_barrio = Barrio_persona and Id_genero = Genero_persona
                    and Apellido_persona like '%$Buscar%' order by id_Persona";
        }

    if ($option == "3")
        {
         
            $query= "SELECT * FROM personas, barrios, genero WHERE 
                    Id_barrio = Barrio_persona and Id_genero = Genero_persona
                    and DNI_persona like '%$Buscar%' order by id_Persona";

        }
        $resultado=mysqli_query($Connect,$query);

        echo "<table style=\"border:5px solid grey\">";
        echo "<tr style = \border:2px solid grey\" bgcolor=\"#d5f5ad\">";
        echo "<td> ID </td>";
        echo "<td> Apellido </td>";
        echo "<td> Nombre </td>";
        echo "<td> DNI </td>";
        echo "<td> Nacimiento </td>";
        echo "<td> Calle </td>";
        echo "<td> Numero </td>";
        echo "<td> Barrio </td>";
        echo "<td> Genero </td>";
        echo "<td> Telefono </td>";
        echo "<td> Email </td>";
    
    
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