<table>

<legend>Estos son los participantes ya registrados</legend>

<tr>
    <!-- Veterano -->
    <th></th>

    <!-- Alias -->
    <th><span class="material-symbols-outlined">id_card</span> Alias</th>

    <!-- Pais -->
    <th><span class="material-symbols-outlined">flag</span> País</th>
    
    <!-- Modalidad -->
    <th><span class="material-symbols-outlined">skateboarding</span> Modalidad </th>
    
    <!-- Instagram -->
    <th><span class="material-symbols-outlined">photo_camera</span> Instagram</th>
    <!-- Tik Tok -->
    <th><span class="material-symbols-outlined">music_note</span> Tik Tok</th>
    <!-- Opciones -->
    <th><span class="material-symbols-outlined">settings</span></th>
</tr>

<?php for ($i=0; $i < count($participantes); $i++) { ?>
<tr>

    <td>
        <?php echo ($participantes[$i][6]==1)?"<span class='material-symbols-outlined medalla'>workspace_premium</span>":''; // Veterano ?>
    </td> 
    <td>
        <?php echo $participantes[$i][1]; // Alias ?>
    </td> 

    <td><?php echo $participantes[$i][4]; // País ?></td>
    <td><?php echo $participantes[$i][5]; // Modalidad ?></td>

    <td><?php echo $participantes[$i][2]; // Instagram ?></td>
    <td><?php echo $participantes[$i][3]; // TikTok ?></td>
    <td class="opciones">
        <a class="editar" href="/gri/marisquinho/participante.php?id=<?php echo $participantes[$i][0]; // id ?>"><span class="material-symbols-outlined">person_edit</span></a>
        
        <form class="eliminar" method="post">
            <button type="submit" class="eliminar--boton">
                <input type="hidden" name="id" value="<?php echo $participantes[$i][0]; // id ?>">
                <span class="material-symbols-outlined">delete</span>    
            </button>
        </form>
    </td>
</tr>
<?php } // foreach ($registrados as $key => $value) ?>

</table>