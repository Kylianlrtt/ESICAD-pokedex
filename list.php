<?php
    require_once("head.php");
    require_once("database-connection.php");
    $query = $databaseConnection->query("SELECT nomPokemon, urlPhoto, T.libelleType as 'Type 1', T2.libelleType as 'Type 2'
    From pokemon P
    JOIN typePokemon T ON P.IdTypePokemon = T.IdType
    LEFT JOIN typePokemon T2 ON P.IdSecondTypePokemon = T2.IdType
    ORDER BY IdPokemon");
    $result = $query->fetch_all(MYSQLI_ASSOC);
   
    ?>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Type 1</th>
                <th>Type 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $pokemon) {
              $row="<tr>
                    <td>". $pokemon['nomPokemon']."</td>
                    <td><img src='".$pokemon['urlPhoto']."' alt='Image de ". $pokemon['nomPokemon']."'></td>
                    <td>". $pokemon['Type 1']."</td>
                    <td>". $pokemon['Type 2']."</td>
                </tr>";
                echo $row;
            } ?>
        </tbody>
    </table>
 
    <?php
    require_once("footer.php");
    ?>
</body>
</html>
 