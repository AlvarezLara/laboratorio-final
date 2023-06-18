<!DOCTYPE html>
<html>

<head>
    <title>Consulta de usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">

        <h1>Listado de usuarios</h1>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cursosql";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuarios_final";
        $result = $conn->query($sql);

        $conn->close();

        if ($result->num_rows == 0) {
            echo '<div class="no-records">No existen registros para mostrar</div>';
        } else {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="record">
                        <p><span class="record-title">Nombre:</span> ' . $row["Nombre"] .'</p>
                        <p><span class="record-title">Primer Apellido:</span> ' . $row["PrimerApellido"] . '</p>
                        <p><span class="record-title">Segundo Apellido:</span> ' . $row["SegundoApellido"] . '</p>
                        <p><span class="record-title">Email:</span> ' . $row["Email"] . '</p>
                      </div>';
            }
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