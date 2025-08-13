<?php //Tiene las opciones y se conecta con el html Listado 

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


            $query="SELECT* FROM libros, autores WHERE 
                    Id_autor = Autor_libro and Titulo_libro like '%$Buscar%' order by 2";        
                   
        }
    if ($option == "2")
        {
            $query= "SELECT* FROM libros, autores WHERE 
                    Id_autor = Autor_libro and Nombre_autor like '%$Buscar%' order by 3";       
                   
        }   

    if ($option == "3")
        {
         
            $query= "SELECT* FROM libros, autores WHERE 
                    Id_autor = Autor_libro and Año_publicacion like '%$Buscar%' order by 4";          
                  

        }
        $resultado=mysqli_query($Connect,$query);

        echo "<table style=\"border:5px solid grey\">";
        echo "<tr style = \"border:2px solid grey\" bgcolor=\"#d5f5ad\">";
        echo "<td> ID </td>";
        echo "<td> Titulo del Libro </td>";
        echo "<td> Autor del Libro </td>";
        echo "<td> ISBN </td>";
        echo "<td> Genero </td>";
        echo "<td> Editorial </td>";
        echo "<td> Fecha de Publicacion </td>";
        echo "<td> stock </td>";
          
        echo "</tr>";
    
    
    
        while($registro=mysqli_fetch_array($resultado))
            {
                if ($bandera==1)
                {
                    echo "<tr style = \border:2px solid grey\" bgcolor=\"#01df01\">";
                    echo "<td>".$registro[0]." "."</td>";
                    echo "<td>".$registro[1]." "."</td>";
                    echo "<td>".$registro[9]." ".$registro[10]." "."</td>";
                    echo "<td>".$registro[3]." "."</td>";
                    echo "<td>".$registro[4]." "."</td>";
                    echo "<td>".$registro[5]." "."</td>";
                    echo "<td>".$registro[6]." "."</td>";
                    echo "<td>".$registro[7]." "."</td>";
                    
                    
                    $bandera=0;
                }  
                    else
                {
                    echo "<tr style = \border:2px solid grey\" bgcolor=\"#d5f5ad\">";
                    echo "<td>".$registro[0]." "."</td>";
                    echo "<td>".$registro[1]." "."</td>";
                    echo "<td>".$registro[9]." ".$registro[10]." "."</td>";
                    echo "<td>".$registro[3]." "."</td>";
                    echo "<td>".$registro[4]." "."</td>";
                    echo "<td>".$registro[5]." "."</td>";
                    echo "<td>".$registro[6]." "."</td>";
                    echo "<td>".$registro[7]." "."</td>";
                    
                    
                    $bandera=1;
                
                } 
            echo "</tr>";
    
            }
    
            echo "</table>";
    
        mysqli_close($Connect);
    
    
    
       
?>