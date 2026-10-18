<?php
//Partie 02 : Structures de contrôle et boucles
    
    //Exercice 2.1 : `if / elseif / else`
    require('config.php');
     function mention($note){
        if ($note>= 16){
            return "Tres bien <br>";
        }elseif ($note>= 14){
            return "Bien <br>";
        }elseif ($note>= 12){
            return "Assez bien <br>";
        }elseif ($note>= 10){
            return "Passable<br>";
        }else{
            return "Ajourne<br>";
        }
     }

echo "<br>";

     echo "Note 17: " . mention(17);
     echo "Note 15: " . mention(15);
     echo "Note 13: " . mention(13);
     echo "Note 11: " . mention(11) ;
     echo "Note 9: " . mention(9) . "<br>";


    //Exercice 2.2 : `switch`
    $mois=date("m");
    switch($mois){
        case 1:
            echo "Janvier";
            break;
        case 2:
            echo "Fevrier";
            break;  
        case 3:
            echo "Mars";    
            break;
        case 4:
            echo "Avril";
            break;
        case 5:
            echo "Mai";
            break;  
        case 6: 
            echo "Juin";    
            break;
        case 7:
            echo "Juillet"; 
            break;
        case 8:         
            echo "Aout";
            break;
        case 9:
            echo "Septembre";
            break;
        case 10:
            echo "Octobre";
            break;
        case 11:
            echo "Novembre";
            break;
        case 12:
            echo "Decembre";
            break;
        default:
            echo "Mois invalide";
            break;
    }
        /*
            Question : Que se passe-t-il si vous oubliez un `break` dans un `case` ?[cite: 6]
            
            -Si on oublie l'instruction `break` dans un `case`, PHP continue l'exécution
            du code dans les cases suivants (c'est ce qu'on appelle le "fall-through"),
            sans vérifier leurs conditions, jusqu'à ce qu'il rencontre un `break`
            ou la fin du bloc `switch`.
        */

echo "<br><br>";

    //Exercice 2.3 : Boucles
    for($i=1; $i<=6; $i++){
        for ($j=1; $j<=$i; $j++){
            echo"*";
        }
        echo "<br>";
    } 
    
echo "<br><br>";
    
    $i = 0;
    while ($i <= 20) {
        if ($i == 10) {
            echo "<strong>$i</strong><br>";
        } else {
            echo "$i<br>";
        }
        $i += 2; 
    }

echo "<br><br>";

    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 != 0) {
            continue;
        }
    echo "$i<br>";
    }

echo "<br><br>";

    $i = 1;
    while (true) {
        switch ($i) {
            case 5:
                echo "At 5<br>";
                break; 
                
            case 10:
                echo "At 10; quitting<br>";
                break 2; 
        }
        $i++;
    }

echo "<br><br>";

    $i = 0;
    do {
        if ($i == 10) {
            echo "<strong>$i</strong><br>";
        } else {
            echo "$i<br>";
        }
        $i += 2;
    } while ($i <= 20);

    /*
        while : La condition est évaluée avant l'exécution du bloc de code. Si la condition est fausse dès le début, le code à l'intérieur de la boucle n'est jamais exécuté.

        do-while : La condition est évaluée après l'exécution du bloc de code. Le code est donc garanti d'être exécuté au moins une fois, même si la condition initiale est fausse.
    */
?>