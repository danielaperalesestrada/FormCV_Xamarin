<?php

$conex = mysqli_connect("localhost", "root", "", "formulario");

if (mysqli_connect_errno()) {
    echo "Error al conectar a MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM datos ORDER BY fecha_registro DESC LIMIT 1";
$query1 = "SELECT * FROM experiencia_laboral ORDER BY fecha_registro DESC LIMIT 1";
$query2 = "SELECT * FROM formacion_academica ORDER BY fecha_registro DESC LIMIT 1";
$resultado = mysqli_query($conex, $query);
$resultado1 = mysqli_query($conex, $query1);
$resultado2 = mysqli_query($conex, $query2);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila['nombre'];
    $fecha = $fila['fecha'];
    $ocupacion = $fila['ocupacion'];
    $telefono = $fila['telefono'];
    $correo = $fila['correo'];
    $lugar = $fila['lugar'];
    $nivel = $fila['nivel'];
    $idiomas = explode(", ", $fila['idiomas']);
    $aptitudes = explode(", ", $fila['aptitudes']);
    $habilidades = explode(", ", $fila['habilidades']);
    $lenguajes = explode(", ", $fila['lenguajes']);
    $perfil = $fila['perfil'];
    mysqli_free_result($resultado);
} else {
    echo "No se encontraron datos del usuario.";
}
if ($resultado1 && mysqli_num_rows($resultado1) > 0) {
    $fila = mysqli_fetch_assoc($resultado1);
    $puesto = $fila['puesto'];
    $empresa = $fila['empresa'];
    $periodo = $fila['periodo'];
    mysqli_free_result($resultado1);
} else {
    echo "No se encontraron datos del usuario.";
}
if ($resultado2 && mysqli_num_rows($resultado2) > 0) {
    $fila = mysqli_fetch_assoc($resultado2);
    $grado = $fila['grado'];
    $institucion = $fila['institucion'];
    $periodo_formacion = $fila['periodo_formacion'];
    mysqli_free_result($resultado2);
} else {
    echo "No se encontraron datos del usuario.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive CV using Html & CSS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="top_side">
            <div class="profileText">
                <div class="imgBx">
                    <img src="img.jpg">
                </div>
                <h2><?php echo $nombre; ?><br><span><?php echo $ocupacion; ?> / <?php echo $fecha; ?></span></h2>
            </div>
        </div>
        <div class="left_Side">
            <div class="contactInfo">
                <h3 class="title">Contacto</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="text"><?php echo $telefono; ?></span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <span class="text"><?php echo $correo; ?></span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="text"><?php echo $lugar; ?></span>
                    </li>
                    
                </ul>
            </div>
            <div class="languages">
                <h3 class="title">Idiomas</h3>
                <ul>
                    <?php
                        foreach($idiomas as $idioma){
                            echo "<li>
                                <span class=\"icon\"><i class=\"fa fa-circle-o\" aria-hidden=\"true\"></i></span>
                                <span class=\"text\">$idioma</span>
                            </li>";
                        }
                    ?>
                    <li>
                        <span class="text">Nivel: <?php echo $nivel; ?></span>
                    </li>
                </ul>
            </div>
            <div class="aptitudes">
                <h3 class="title">Aptitudes</h3>
                <ul>
                    <?php
                        foreach($aptitudes as $aptitud){
                            echo "<li>
                                <span class=\"icon\"><i class=\"fa fa-circle-o\" aria-hidden=\"true\"></i></span>
                                <span class=\"text\">$aptitud</span>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="skills">
                <h3 class="title">Habilidades</h3>
                <ul>
                    <?php
                        foreach($habilidades as $habilidad){
                            echo "<li>
                                <span class=\"icon\"><i class=\"fa fa-circle-o\" aria-hidden=\"true\"></i></span>
                                <span class=\"text\">$habilidad</span>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="others">
                <h3 class="title">Lenguajes de programación</h3>
                <ul>
                    <?php
                        foreach($lenguajes as $lenguaje){
                            echo "<li>
                                <span class=\"icon\"><i class=\"fa fa-circle-o\" aria-hidden=\"true\"></i></span>
                                <span class=\"text\">$lenguaje</span>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="right_Side">
            <div class="profile">
                <h3 class="title_1">Perfil</h3>
                <p class="texto-justificado"><?php echo $perfil; ?></p>
            </div>
            <div class="workExperience">
                <h3 class="title_1"><br>Experiencia laboral</h3>
                <div class="job">
                    <h3>Puesto:</h3>
                    <ul>
                        <li><?php echo $puesto; ?></li>
                    </ul>
                </div>
                
                <div class="job">
                    <h3>Empresa:</h3>
                    <ul>
                        <li><?php echo $empresa; ?></li>
                    </ul>
                </div>
                
                <div class="job">
                    <h3>Periodo:</h3>
                    <ul>
                        <li><?php echo $periodo; ?></li>
                    </ul>
                </div>
            </div>
            <div class="training">
                <h3 class="title_1"><br>Formación</h3>
                <div class="job">
                    <h3>Grado:</h3>
                    <ul>
                        <li><?php echo $grado; ?></li>
                    </ul>
                </div>
                
                <div class="job">
                    <h3>Institución:</h3>
                    <ul>
                        <li><?php echo $institucion; ?></li>
                    </ul>
                </div>
                
                <div class="job">
                    <h3>Periodo de formación:</h3>
                    <ul>
                        <li><?php echo $periodo_formacion; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
