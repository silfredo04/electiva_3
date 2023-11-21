<?php include('navbar.php'); ?>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<div class="content">
    <h2>Formulario de Información</h2>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $estadoCivil = $_POST['estado_civil'];

        $conexion = new mysqli("localhost", "root", "", "electiva_3");

        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }

        
        $query = "INSERT INTO datos (codigo, nombre, correo, sexo, estado_civil) VALUES ('$codigo', '$nombre', '$correo', '$sexo', '$estadoCivil')";

        if ($conexion->query($query) === TRUE) {
            echo "Datos almacenados correctamente.";
        } else {
            echo "Error al almacenar datos: " . $conexion->error;
        }

        $conexion->close();
    }
    ?>

    <!-- Formulario -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>

        <label>Sexo:</label>
        <input type="radio" name="sexo" value="masculino" required> Masculino
        <input type="radio" name="sexo" value="femenino" required> Femenino

        <label for="estado_civil">Estado Civil:</label>
        <select name="estado_civil" required>
            <option value="soltero">Soltero/a</option>
            <option value="casado">Casado/a</option>
            <option value="divorciado">Divorciado/a</option>
            <option value="viudo">Viudo/a</option>
        </select>

        <input type="submit" value="Guardar">
    </form>
</div>
