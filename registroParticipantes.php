<?php

    include __DIR__ . '/scripts/database.php';

    // Mensajes ----------------------------
    $mensajes = [];

    // Campos de la tabla de partipantes
    $nombre = '';
    $apellidos = '';
    $telefono = '';
    $email = '';
    $dni = '';
    $fechaNacimiento = '';
    $alias = '';
    $veterano = '';
    $sponsors = '';
    $musica = '';
    $instagram = '';
    $tiktok = '';
    $id_modalidad = '';
    $id_pais = '';

    $modalidades = []; // Arrays con las modalidades disponibles
    $paises = []; // Arrays con los paises disponibles

    // Cargar Modalidades
    $query = "SELECT * FROM modalidades";
    $resultado = $conn->query($query)->fetch_all();
    foreach ($resultado as $key => $value) {
        $modalidades[$key] = $value ;
    }

    // Cargar paises
    $query = "SELECT * FROM paises";
    $resultado = $conn->query($query)->fetch_all();
    foreach ($resultado as $key => $value) {
        $paises[$key] = $value ;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validar datos
        // Campos de la tabla de partipantes
        // Sanitizar datos
        $nombre = s($_POST['nombre'] ?? '');
        $apellidos = s($_POST['apellidos'] ?? '');
        $telefono = s($_POST['telefono'] ?? '');
        $email = s($_POST['email'] ?? '');
        $dni = s($_POST['dni'] ?? '');
        $fechaNacimiento = s($_POST['fechaNacimiento'] ?? '1984-07-01');
        $alias = s($_POST['alias'] ?? '');
        $veterano = s($_POST['veterano']=='on'?1:0);
        $sponsors = s($_POST['sponsors'] ?? '');
        $musica = s($_POST['musica'] ?? '');
        $instagram = s($_POST['instagram'] ?? '');
        $tiktok = s($_POST['tiktok'] ?? '');
        $id_modalidad = s( intval($_POST['modalidad']) ?? 1);
        $id_pais = s( intval($_POST['pais']) ?? 57);

        // Insertar en la BBDD 
        $query = "INSERT INTO participantes (nombre, apellidos, telefono, email, dni, fecha_nacimiento, alias, veterano, sponsors, musica, instagram, tiktok, id_modalidad, id_pais) VALUES
        ( '{$nombre}', '{$apellidos}', '{$telefono}', '{$email}', '{$dni}', '{$fechaNacimiento}', '{$alias}', '{$veterano}', '{$sponsors}','{$musica}', '{$instagram}','{$tiktok}', {$id_modalidad}, {$id_pais})";

        $resultado = $conn->query($query);

        // Devolver el resultado 
        if ($resultado) {
            header('Location: /gri/marisquinho/participantes.php');
        }
        
    }

    // Sanitizar los datos --------
    function s($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Debuguear -----------------------
    function debuguear($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }

?>

    <?php include __DIR__ . '/scripts/header.php'; ?>

    <main>
    <form method='post' >
        <legend>Rellena el formulario para registrar tu participación:</legend>
        
        <?php include_once __DIR__ .'/scripts/formulario.php'; ?>
        
        <div class="campo">
            <label for="btnRegistrar">Registra tu participación:  </label>
            <input type="submit" value="¡Registrate!" name="btnRegistrar">
        </div>

    </form>
    </main>
    
    <?php include __DIR__ . '/scripts/footer.php'; ?>

