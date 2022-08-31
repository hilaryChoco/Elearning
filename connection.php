<?php 

try
{
  // Connexion à la base de données
$db = new // Objet qui représente la connexion à la base de données
PDO('mysql:host=localhost;dbname=elearn;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  // En cas d'erreur on affiche un message et on arrete
  die('Erreur : ' . $e->getMessage());
}
?>