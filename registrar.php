<?php
include("conexion.php");

if (isset($_POST['register'])) {

    // Obtener y limpiar los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $fecha = isset($_POST['fecha']) ? date("Y-m-d", strtotime($_POST['fecha'])) : "";
    $ocupacion = isset($_POST['ocupacion']) ? trim($_POST['ocupacion']) : "";
    $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : "";
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : "";
    $lugar = isset($_POST['lugar']) ? trim($_POST['lugar']) : "";
    $idiomas = isset($_POST['idiomas']) ? implode(", ", $_POST['idiomas']) : "";
    $nivel = isset($_POST['nivel']) ? trim($_POST['nivel']) : '';
    $aptitudes = isset($_POST['aptitudes']) ? implode(", ", $_POST['aptitudes']) : "";
    $habilidades = isset($_POST['habilidades']) ? implode(", ", $_POST['habilidades']) : "";
    $lenguajes = isset($_POST['lenguajes']) ? implode(", ", $_POST['lenguajes']) : "";
    $perfil = isset($_POST['perfil']) ? trim($_POST['perfil']) : "";

    $mensajeExito = "";
    $mensajeError = "";

    if (
        empty($nombre) ||
        empty($fecha) ||
        empty($ocupacion) ||
        empty($telefono) ||
        empty($correo) ||
        empty($lugar) ||
        empty($idiomas) ||
        empty($nivel) ||
        empty($aptitudes) ||
        empty($habilidades) ||
        empty($lenguajes) ||
        empty($perfil) ||
        empty($_POST['puesto'][0]) ||
        empty($_POST['empresa'][0]) ||
        empty($_POST['periodo'][0]) ||
        empty($_POST['grado'][0]) ||
        empty($_POST['institucion'][0]) ||
        empty($_POST['periodo_formacion'][0])
    ) {
        $mensajeError = "<h3 class='error'>Llena todos los campos</h3>";
        echo $mensajeError;
    } else {
        // Insertar datos en la tabla `datos`
        $consultaDatos = "INSERT INTO datos (nombre, fecha, ocupacion, telefono, correo, lugar, idiomas, nivel, aptitudes, habilidades, lenguajes, perfil)
                         VALUES ('$nombre', '$fecha', '$ocupacion', '$telefono', '$correo', '$lugar', '$idiomas', '$nivel', '$aptitudes', '$habilidades', '$lenguajes', '$perfil')";

        $resultadoDatos = mysqli_query($conex, $consultaDatos);

        if ($resultadoDatos) {
            // Insertar datos en la tabla `experiencia_laboral`
            if (!empty($_POST['puesto'][0])) {
                foreach ($_POST['puesto'] as $key => $puesto) {
                    $empresa = $_POST['empresa'][$key];
                    $periodo = $_POST['periodo'][$key];
                    $consultaExp = "INSERT INTO experiencia_laboral (puesto, empresa, periodo) VALUES ('$puesto', '$empresa', '$periodo')";
                    $resultadoExp = mysqli_query($conex, $consultaExp);
                    if (!$resultadoExp) {
                        $mensajeError .= "<h3 class='error'>Error al guardar experiencia laboral</h3>";
                    }
                }
            }

            // Insertar datos en la tabla `formacion_academica`
            if (!empty($_POST['grado'][0])) {
                foreach ($_POST['grado'] as $key => $grado) {
                    $institucion = $_POST['institucion'][$key];
                    $periodo_formacion = $_POST['periodo_formacion'][$key];
                    $consultaFormacion = "INSERT INTO formacion_academica (grado, institucion, periodo_formacion) VALUES ('$grado', '$institucion', '$periodo_formacion')";
                    $resultadoFormacion = mysqli_query($conex, $consultaFormacion);
                    if (!$resultadoFormacion) {
                        $mensajeError .= "<h3 class='error'>Error al guardar formación académica</h3>";
                    }
                }
            }

            // Redireccionar a `archivo_principal.php`
            header("Location: archivo_principal.php");
            exit();
        } else {
            $mensajeError = "<h3 class='error'>Ocurrió un error al guardar los datos principales</h3>";
        }

        mysqli_close($conex);
    }
}
?>
