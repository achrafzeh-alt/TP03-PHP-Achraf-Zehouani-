<?php

// Exercice 4.2 : Formulaire en GET
if (isset($_GET['sexe']) && isset($_GET['nom']) && isset($_GET['prenom'])) {
    @$nom= $_GET['nom'];
    @$prenom= $_GET['prenom'];
    @$sexe= $_GET['sexe'];
    if ($sexe==='M'){
        echo "Bonjour Monsieur ". $prenom . " " . $nom ;
    }else{
        echo "Bonjour Madame " . $prenom . " " . $nom ;
    }
} else {
    echo "Veuillez remplir le formulaire d'abord.";
}

/*
Lorsque tu cliques sur "Envoyer", tu verras les données s'afficher directement dans la barre d'adresse du navigateur.
C'est la caractéristique principale de la méthode GET.
*?
*/
?>