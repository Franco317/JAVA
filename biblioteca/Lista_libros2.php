<?php 

    $option=$_GET['option'];
    $Buscar=$_GET['Buscar'];


    $bandera = 0;

    $Server="localhost";
    $User="root";
    $Pass="";
    $Base="biblioteca";

    $Connect=mysqli_connect($Server, $User, $Pass, $Base)
     or die ("no se pudo conectar");
    


    if ($option == "1")
        {


            $query="SELECT* FROM autores, libros, usuarios , prestamos  WHERE 
                    Id_libro = Libro_id and Id_autor = Autor_libro and Id_usuario =Usuario_id            
                    and Titulo_libro like '%$Buscar%' order by 2";
        }
    if ($option == "2")
        {
            $query= "SELECT* FROM autores ,libros,usuarios, prestamos  WHERE 
                    Id_libro = Libro_id and Id_autor = Autor_libro and Id_usuario =Usuario_id            
                    and Autor_libro like '%$Buscar%' order by 3";
        }   

    if ($option == "3")
        {
         
            $query= "SELECT* FROM autores, libros ,usuarios , prestamos  WHERE 
                    Id_libro = Libro_id and Id_autor = Autor_libro and Id_usuario = Usuario_id            
                    and Nombre_usuario like '%$Buscar%' order by 4";

        }
        $resultado=mysqli_query($Connect,$query);

        echo "<table style=\"border:5px solid grey\">";
        echo "<tr style = \"border:2px solid grey\" bgcolor=\"#d5f5ad\">";
        echo "<td> ID </td>";
        echo "<td> Nombre autor </td>";
        echo "<td> Apellido autor </td>";
        echo "<td> Fecnac Autor </td>";
        echo "<td> Nacionalidad </td>";
        echo "<td>Titulo </td>";
        echo "<td> Numero </td>";
        echo "<td> stock </td>";
        echo "<td> Nombre usuario </td>";
        echo "<td> Telefono </td>";
        echo "<td> Email </td>";
        echo "<td> Acciones </td>";///acciones
    
    
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
                    echo "<td><a href=ModificarLibro.php?Id_libro=".$registro[0].">Modificar </a> "."</td>";
                    echo "<td><a href=EliminarLibro.php?Id_libro=".$registro[0].">Eliminar </a> "."</td>";
                    
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
                    echo "<td><a href=ModificarLibro.php?Id_libro=".$registro[0].">Modificar </a> "."</td>";
                    echo "<td><a href=EliminarLibro.php?Id_libro=".$registro[0].">Eliminar </a> "."</td>";
                    
                    $bandera=1;
                
                } 
            echo "</tr>";
    
            }
    
            echo "</table>";
    
        mysqli_close($Connect);
    
    
    
       
?>