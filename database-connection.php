<?php
 
// on paramètre mysqli pour afficher toutes les erreurs, et s'arrêter lorsqu'il y en a une
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/* on déclare une variable $connection à la BDD de test (on crée un objet de connexion)
 le mot-clé global indique que cette variable sera partagée avec d’autres fichiers */
global $connection;
/* mysqli_connect() retourne un objet qui représente la connexion
 au serveur MySQL, ou false si une erreur survient.
*/
$connection = mysqli_connect("localhost", "root", null, "esicad pokedex", 3306);
if (!$connection) {
 // en cas d'erreur, la fonction mysqli_connect_error() indique la cause de l'échec de la connexion
 throw new RuntimeException("Cannot connect to the database. Cause : " . mysqli_connect_error());
}
 
/*
Ce fichier permet de définir un objet de connexion $databaseConnection
que vous pouvez utiliser dans chaque page qui nécessite de faire une requête au SGBD
Il suffit d'utiliser l'instruction require_once("database_connection.php")
pour que la variable $databaseConnection soit utilisable dans votre page
*/
global $databaseConnection;
 
/* A COMPLETER : remplacer les paramètres pour se connecter à votre base de données de pokémon */
$databaseConnection = mysqli_connect(
    'localhost',
    "root",
    null,
    "esicad pokedex",
    3306
);
 
?>