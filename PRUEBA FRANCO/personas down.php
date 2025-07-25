<?php
     

     $Server="localhost";
     $Base="prueba franco";
     $User="root" ;
     $Pass="" ;

     $Connect=mysqli_connect($Server, $User ,$Pass , $Base);

     //genero conulta a la tabla barrios y la ordeno por nombre

     $QueryB="Select * from barrios order by 2";
     $ResultadoB= mysqli_query($Connect,$QueryB);

     $QueryC="Select * from generos order by 2";
     $ResultadoC= mysqli_query($Connect,$QueryC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TE VOY A ROBAR TUS DATOS</title>
</head>
<body>
    <form action="recibe.php"method="post"><!---->
        <h2>Carga de Datos</h2>

        <br>
        <label>
            Nombre
        </label>
        <input type="text" name="Nombre">
        <br>
        <label>
            Apellido
        </label>
        <input type="text" name="Apellido">
        
        <br>
        <label>
            FecNac
        </label>
        <input type="date" name="FecNac" />
        <br>

        <label >
             DNI
        </label>
        <input type="text" maxlength="8" minlength="8" placeholder="12345678" name="DNI"/>
        <br>
        <label >Calle  </label>
        <input type="text" name="Calle"  />
        <label >Numero </label>
        <input type="text" name="Numero" />

        <br>
        <label > Barrio </label>
        <select name="Barrio">

            <?php // vuelvo a abrir script de php    

                $fila=mysqli_num_rows($ResultadoB);
                if ($fila>0)
                    {
                        while($registro=mysqli_fetch_array($ResultadoB))

                        {
                            echo '<option value="'.$registro[0].'">'.$registro[1].' </option>';
                        }
                    }

                    else
                        {
                            echo '<option> sin datos </option>';     
                        }
                    





            ?>


        </select>
        <input type="text" name="Barrio" />
        <br>
        <label >Genero  </label>
        <select name="Genero" >
        <?php // vuelvo a abrir script de php    

$fila=mysqli_num_rows($ResultadoC);
if ($fila>0)
    {
        while($registro=mysqli_fetch_array($ResultadoC))

        {
            echo '<option value="'.$registro[0].'">'.$registro[1].' </option>';
        }
    }

    else
        {
            echo '<option> sin datos </option>';     
        }
    





        ?>
        </select>
                               
        <input type="text" name="Genero" />
        <br>
        <label >Telefono  </label>
        <input type="number" name="telefono" />
        <br>
        <label >Email</label>
        <input type="text" name="email" />
        <br>

        
       
        <input type="submit" name="submint" value="Guardar"/>
        <input type="reset" name="reset" value="cancelar">

        
    </form>
    
</body>
</html>