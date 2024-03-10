<?php
require_once("head.php");
require_once("database-connection.php");
$idPokemon = $_GET['id'];
$query = $databaseConnection->("SELECT idPokemon, nomPokemon, urlPhoto, T.libelleType as 'Type 1', T2.libelleType as 'Type 2'
    FROM pokemon P  
    JOIN typepokemon T ON P.IdSecondTypePokemon = T2.IDType 
    LEFT JOIN tpepokemon T2 ON P.IdSecondTypePokemon = T2.IdType
    ORDER BY idPokemon ASC");
$result = $query-> 