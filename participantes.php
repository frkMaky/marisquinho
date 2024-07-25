<?php

    include __DIR__ . './scripts/database.php';

    // Cargar participantes
    $participantes = [];

    $modo = $_GET['mod'] ?? '';

    switch ($modo) {
        case 'skate':
            $query = "SELECT p.id, p.alias,p.instagram,p.tiktok, pais.nombre, m.nombre, p.veterano FROM participantes as p LEFT JOIN paises as pais ON p.id_pais = pais.id LEFT JOIN modalidades as m ON p.id_modalidad = m.id WHERE m.id = 1;";
            break;
        case 'bmx':
            $query = "SELECT p.id, p.alias,p.instagram,p.tiktok, pais.nombre, m.nombre, p.veterano FROM participantes as p LEFT JOIN paises as pais ON p.id_pais = pais.id LEFT JOIN modalidades as m ON p.id_modalidad = m.id WHERE m.id = 2;";
            break;
        case 'breaking':
            $query = "SELECT p.id, p.alias,p.instagram,p.tiktok, pais.nombre, m.nombre, p.veterano FROM participantes as p LEFT JOIN paises as pais ON p.id_pais = pais.id LEFT JOIN modalidades as m ON p.id_modalidad = m.id WHERE m.id = 3;";
            break;
        default:
            $query = "SELECT p.id, p.alias,p.instagram,p.tiktok, pais.nombre, m.nombre, p.veterano FROM participantes as p LEFT JOIN paises as pais ON p.id_pais = pais.id LEFT JOIN modalidades as m ON p.id_modalidad = m.id;";
            break;
    }

    $resultado = $conn->query($query)->fetch_all();
    
    foreach ($resultado as $p) {
        $participantes[] = $p ;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Eliminar
        $id = $_POST['id'];

        $query = "DELETE FROM participantes WHERE id = {$id}";

        $resultado = $conn->query($query);

        if ($resultado) {
            header('Location: ./');
        }
    }

    function debuguear($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }


?>
    <?php include __DIR__ . '/scripts/header.php'; ?>

    <nav class="filtrosParticipantes"> Filtrar por modalidad:
        <a class="filtrosParticipantes-enlace" href="./participantes.php"><span class="material-symbols-outlined"> menu </span> </a>
        <a class="filtrosParticipantes-enlace" href="./participantes.php?mod=skate"> <span class="material-symbols-outlined">skateboarding</span> </a>
        <a class="filtrosParticipantes-enlace" href="./participantes.php?mod=bmx"><span class="material-symbols-outlined"> directions_bike </span> </a>
        <a class="filtrosParticipantes-enlace" href="./participantes.php?mod=breaking"><span class="material-symbols-outlined"> group </span></a>
    </nav>
    
    <main class="participantesRegistrados">

    <?php include_once __DIR__ . './scripts/tablaParticipantes.php';?>

    </main>


    <?php include __DIR__ . './scripts/footer.php'; ?>