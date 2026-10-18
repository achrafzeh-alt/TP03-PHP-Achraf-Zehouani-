<?php

// Exercice 4.2 : Formulaire en GET

$Nom= $_GET['Nom'];
$Prenom= $_GET['Prenom'];
$Sexe= $_GET['Sexe'];
if ($Sexe==='M'){
    echo "Bonjour Monsieur ". $Prenom . " " . $Nom ;
}else{
    echo "Bonjour Madame " . $Prenom . " " . $Nom ;
}

/*
Lorsque tu cliques sur "Envoyer", tu verras les données s'afficher directement dans la barre d'adresse du navigateur.
C'est la caractéristique principale de la méthode GET.
*?
*/
?>