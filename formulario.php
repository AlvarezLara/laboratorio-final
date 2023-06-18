<!DOCTYPE html>
<html>

<head>
    <title>Consulta de usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cursosql";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_POST) {
            $nombre = $_POST["nombre"];
            $primerApellido = $_POST["primerApellido"];
            $segundoApellido = $_POST["segundoApellido"];
            $email = $_POST["email"];
            $login = $_POST["login"];
            $userPassword = $_POST["password"];

            $errores = validarCampos($conn, $nombre, $primerApellido, $segundoApellido, $email, $login, $userPassword);

            if (!empty($errores)) {
                echo "<h2>Se encontraron los siguientes errores:</h2>";
                echo "<ul>";
                foreach ($errores as $error) {
                    echo "<li class='error-list-item'>$error</li>";
                }
                echo "</ul>";
            } else {
                $sql = "INSERT INTO usuarios_final (nombre, primerapellido, segundoapellido, email, login, password)
    VALUES ('$nombre', '$primerApellido', '$segundoApellido', '$email', '$login', '$userPassword')";

                if ($conn->query($sql) === true) {
                    echo '<div class="with-no-errors">Registro completado con éxito</div>';
                } else {
                    echo '<div class="with-errors">Error al guardar los datos: ' . $conn->error . '</div>';
                }
            }
        }
        $conn->close();

        function esUnEmailValido($email)
        {
            $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

            return preg_match($patron, $email);
        }

        function validarCampos($conn, $nombre, $primerApellido, $segundoApellido, $email, $login, $userPassword)
        {
            $errores = array();

            if (empty($nombre)) {
                $errores["nombre"] = "El campo Nombre es obligatorio";
            }

            if (empty($primerApellido)) {
                $errores["primerApellido"] = "El campo Primer Apellido es obligatorio";
            }

            if (empty($segundoApellido)) {
                $errores["segundoApellido"] = "El campo Segundo Apellido es obligatorio";
            }

            if (empty($email)) {
                $errores["email"] = "El campo Email es obligatorio";
            } else if (!esUnEmailValido($email)) {
                $errores["email-mal-formato"] = "Por favor, ingresa un email válido";
            } else {
                $sql = "SELECT * FROM usuarios_final WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errores["email-duplicado"] = "El email ya está registrado. Por favor, utiliza otro email.";
                }
            }

            if (empty($login)) {
                $errores["login"] = "El campo Login es obligatorio";
            }

            if (empty($userPassword)) {
                $errores["password"] = "El campo Password es obligatorio";
            } else {
                $longitud = strlen($userPassword);
                if ($longitud < 4 || $longitud > 8) {
                    $errores["passwordLength"] = "El campo password debe tener entre 4 y 8 caracteres";
                }
            }

            return $errores;
        }
        ?>
        <input class="btn btn-submit" name="volver" type="button" value="Volver" onclick="redirigir()" />
    </div>

</body>
<script>
    const redirigir = () => {
        window.location.href = "index.html";
    }
</script>

</html>