<?php 
// Partie 0: Mise en place
    echo "Hello PHP <br>";
    // commentaire sur une ligne
    /*
    commentaire sur plusieurs lignes
    */
    # commentaire sur une ligne


//Partie 1: Variables, constantes, types et chaines

    //Exercice 1.1: Noms de variables
    $x=1; // Valide : commence par une lettre
    $_x=2; // Valide : commence par un tiret bas (_)
    $Prix_Ht=3; // Valide : commence par une lettre et un tiret bas
    $etat=4; // Valide : commence par une lettre 

    /*
    $2x : Invalide. Le caractère suivant le $ est un chiffre (2), ce qui est interdit.
    $x-y : Invalide. Contient un tiret (-), qui est interprété comme un opérateur de soustraction.
    $prix ht : Invalide. Contient un espace, qui est interdit.
    */

echo "<br>";

    $a = "valeur de a minuscule";
    $A = "VALEUR DE A MAJUSCULE";
    echo $a . "<br>"; // Affiche : valeur de a minuscule
    echo $A . "<br>"; // Affiche : VALEUR DE A MAJUSCULE
    /* 
        PHP est sensible à la casse. 
        $a et $A sont donc deux variables totalement distinctes.
    */
        
echo "<br>";

    //Exercice 1.2 : Constantes
    require('config.php');
    echo "<br> Etablissement :" .Etablissement;
    echo "<br> Note Min :" .NOTE_MIN;
    echo "<br> Note Max :" .NOTE_MAX;
    echo "<br> Seuil :" .SEUIL. "<br>";

    if (defined('SEUIL')) {
        echo "<br> La constante SEUIL est définie.";
    } else {
        echo "<br> La constante SEUIL n'est pas définie.";
    }
    if (defined('INCONNUE')) {
        echo "<br> La constante INCONNUE est définie.";
    } else {
        echo "<br> La constante INCONNUE n'est pas définie.";
    }


echo "<br>";

    //Exercice 1.3 : Calcul
    echo "<br> Prix TTC : " .$prix_ttc;

echo "<br><br>";

    //Exercice 1.4 : Types et conversions
    var_dump($test_str);
    echo "Décimal : " . $dec . "<br>";
    echo "Hexadécimal : " . $hex . "<br>";
    echo "Octal : " . $oct . "<br>";
    echo "Binaire : " . $bin . "<br>";
?>