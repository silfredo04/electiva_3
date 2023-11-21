<?php include('navbar.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>


<div class="content">
    <h2>Misión</h2>

    <p>Nuestra misión es crear una aplicación de agenda que se convierta en la herramienta indispensable para la gestión eficiente y organización personal. Nos comprometemos a proporcionar a nuestros usuarios una experiencia intuitiva y completa que les permita mantenerse conectados con las personas que son importantes en sus vidas.</p>

    <?php
    $objetivos = array(
        array("Facilitar la Creación de Contactos", 
              "Proporcionar una interfaz sencilla para agregar nuevos contactos a la agenda.
               Incluir campos detallados para información crucial como nombre, número de teléfono, dirección de correo electrónico, y notas personalizadas.",
                "images/fas.jpg"),
        array("Ofrecer Funcionalidades de Organización", 
        "Permitir la clasificación de contactos en categorías (amigos, familia, trabajo, etc.).
        Implementar etiquetas y filtros para una rápida y fácil búsqueda de contactos.", 
        "images/ff.jpg"),
    );
    ?>

    <table>
        <thead>
            <tr>
                <th>Objetivo</th>
                <th>Descripción</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($objetivos as $objetivo) {
                echo "<tr>";
                echo "<td>{$objetivo[0]}</td>";
                echo "<td>{$objetivo[1]}</td>";
                echo "<td><img src='{$objetivo[2]}' alt='{$objetivo[0]}'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

