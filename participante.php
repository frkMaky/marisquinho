<?php

    include __DIR__ . '/scripts/database.php';

    $id = $_GET['id'];

    $query = "SELECT p.nombre, p.apellidos, p.alias, p.sponsors, p.musica, p.instagram, p.tiktok, p.veterano, pais.nombre as pais, m.nombre as modalidad FROM participantes as p 
LEFT JOIN paises as pais ON pais.id = p.id_pais
LEFT JOIN modalidades as m ON m.id = p.id_modalidad
WHERE p.id ={$id}";

    $resultado = $conn->query($query);

    $participante = $resultado->fetch_assoc();

    function debuguear($data) {
        echo "<pre>";
        var_dump($data);
        echo "<(pre>";
    }
?>

<?php include __DIR__ . '/scripts/header.php'; ?>

<main>

    <h1 class="infoParticipante">Info del participante: </h1>
    <table class="contenedor contenedor--participante">
        <?php foreach ($participante as $key => $value) { ?>
            <tr class="camposKeyValue">
                
                <td class="campoKey"><?php echo strtoupper($key); ?></td>
                
                <?php
                if (strtoupper($key) == "VETERANO") {
                    if (strtoupper($value) == 1) {
                        echo "<td class='campoValue'><span class='contenedor material-symbols-outlined'> workspace_premium </span></td>";
                    } else {
                        echo "<td class='campoValue'></td>";
                    }
                } else {
                ?>
                <td class="campoValue"><?php echo $value; ?></td>
                <?php } // else - if VETERANO ?>
            </tr>
        <?php } // foreach ?>
    </table>
</main>

<?php include __DIR__ . '/scripts/footer.php'; ?>