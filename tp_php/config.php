<?php

    //Exercice 1.2 : Constantes
    const Etablissement = "FSSM";
    define("NOTE_MIN", 0);
    define("NOTE_MAX", 20);
    define("SEUIL",10);
    /*
    Question 1 : Que se passe-t-il si vous affichez une constante non définie ?
    
        - Afficher une constante non définie déclenche une erreur fatale de type Error (Undefined constant). Le script s'arrête.
    
    Question 2 : Quelle différence y a-t-il entre `const` et `define()` ?
    
        - `const` est un mot-clé évalué au moment de la compilation. Il ne peut pas 
        être utilisé à l'intérieur de "if/loops" ni dans des fonctions, 
        mais il s'utilise au niveau global ou à l'intérieur d'une classe.
    
        - `define()` est une fonction évaluée au moment de l'exécution. 
        Elle est plus flexible et peut être utilisée dans des conditions (if) ou des fonctions, 
        mais ne peut pas définir de constante à l'intérieur d'une classe.
    */

    //Exercice 1.3 : Calcul    
    $prix_Ht=60;
    $tva=20;
    $prix_ttc=$prix_Ht*(1+$tva/100);

    //Exercice 1.4 : Types et conversions
    $test=42;
    $test_str= (string)$test; // Conversion en chaîne de caractères
    var_dump($test_str); 

echo "<br>";

    var_dump((bool) 0);      // bool(false)
    var_dump((bool) 0.0);    // bool(false)
    var_dump((bool) "0");    // bool(false)
    var_dump((bool) "");     // bool(false)
    var_dump((bool) "abc");  // bool(true)
    var_dump((bool) [] );    // bool(false)
    var_dump((bool) null);   // bool(false)

echo "<br>";

    var_dump((int) 3.9);      // int(3)
    var_dump((int) "12abc");  // int(12)
    var_dump((float) "1.5e3");// float(1500)
    var_dump((int) true);     // int(1)

echo "<br>";    

    $dec = 255;    // décimale 
    $hex = 0xFF;   // hexadécimale
    $oct = 0377;   // octale 
    $bin = 0b11111111; // binaire

echo "<br>";    

    //Exercice 1.5 : Chaînes de caractères
        
        //Party1:
        $traitees="egales a";
        $ici=2;
        echo 'Ahemed a dit: :"J\'ai reussi"<br>';
        echo 'Voulez-vous supprimer C:\*.*?<br>';
        echo "Ceci n'affichera pas \\n de nouvelle ligne<br>";
        echo 'Les variables ne seront pas $traitees$ici<br>';
        echo "Les variables seront $traitees$ici ici<br>";

echo "<br>";

        //Party2:
        $str="*Bonjour les developpeurs*";
        $str1=trim($str,"*");
        echo $str1 . "<br>";
echo "<br>";    

        for ($i=0; $i<strlen($str1); $i++){
            echo $str1[$i]."<br>";
        }
        

?>
