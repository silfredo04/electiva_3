<?php include('navbar.php'); ?>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<div class="content">
    <h2>Productos</h2>

    
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="sexo">Buscar por Sexo:</label>
        <select name="sexo" id="sexo">
            <option value="todos">Todos</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>

        <label for="codigo">Buscar por Código:</label>
        <input type="text" name="codigo">

        <input type="submit" value="Buscar">
    </form>

    <?php
    
    $sexo = $_GET['sexo'] ?? 'todos';
    $codigo = $_GET['codigo'] ?? '';

    
    $conexion = new mysqli("localhost", "root", "", "electiva_3");

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    
    $query = "SELECT codigo, nombre, correo, sexo, estado_civil FROM datos WHERE 1";

    if ($sexo != 'todos') {
        $query .= " AND sexo = '$sexo'";
    }

    if (!empty($codigo)) {
        $query .= " AND codigo = '$codigo'";
    }

    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Código</th><th>Nombre</th><th>Correo</th><th>Sexo</th><th>Estado Civil</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['codigo']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['correo']}</td>";
            echo "<td>{$row['sexo']}</td>";
            echo "<td>{$row['estado_civil']}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    $conexion->close();
    ?>
</div>
