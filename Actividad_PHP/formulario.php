
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>  
    <body>
        <div class="group">
            
            <form method="POST" action="">
            <h1>FORMULARIO DE REGISTRO</h1>
                <label for="nombre">Nombre: <span><em>(requerido)</em></span></label>
                <input type="text" name="nombre" class="form-input" required/>
                <br />
                <label for="apellido">Apellido: <span><em>(requerido)</em></span></label>
                <input type="text" name="apellido" class="form-input" required />
                <br />
                <label for="email">Email: <span><em>(requerido)</em></span></label>
                <input type="email" name="email" class="form-input" required/>
                <br/>
                <input class="form-btn" name="submit" type="submit" value="Suscribirse" />
           
            <?php
            if($_POST){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
            }
            //Conexión con PDO

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";

            //Crear connexión
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            //Condicional que nos indica si la conexión ha sido correcta
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connection_error);
            };

            //hacemos la pregunta a la BBDD (Query)
            $sql = "INSERT INTO usuarios (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "Nueva entrada creada correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            };

            //con esto cerramos la base de datos
            $conn->close();
            ?>       
           
           
            </form>
        </div>
    </body>
</html>