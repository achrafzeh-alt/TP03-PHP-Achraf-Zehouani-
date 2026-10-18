<?php
    define('ETABLISSEMENT', 'Université Cadi Ayyad - FSSM');
    require_once('includes/entete_inc.php');
    require_once('includes/menu_inc.php');
?>
<?php
//partie 03: Tableaux

    //Exercice 3.1: Creation
    $notes= array(
        "Mohamed"=> 16, "Ahmed"=> 14, "Hind"=> 13, "Aicha"=> 15, 
        "Samir"=> 13, "Zakaria"=> 13, "Rafik"=> 10, "Ilham"=> 9,
        "Hamza"=> 7, "Sami"=> 7, "Noura"=> 14
    );

    $modules= [
        1=> "Maths", 2=> "Physique", 3=> "Informatique" 
    ];
    
    echo "<b>Affichage avec foreach: <b>";
    echo "<br><br>";
    foreach($modules as $index => $module){
        echo "Module " . ($index) . ": " . $module . "<br>\n";
    }

    // Exercice 3.2 : Affichage HTML
    echo "<hr><br>";
    require('exo2_flux.php');
    echo "<hr>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .ligne-alerte{
            color: red;
        }

    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom: </th>
                <th>Notes: </th>
                <th>Mention: </th>   
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notes as $nom => $note): 
            ?>
            <?php $classe= ($note < SEUIL) ? 'class="ligne-alerte"' : '';
            ?>
            <tr <?= $classe ?>>
                <td><?= $nom ?></td>
                <td><?= $note ?></td>
                <td><?= mention($note) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    
    </table>
</body>
</html>
    
<?php
    //Exercice 3.3 : Statistiques

    $sommeNote=0;
    $nombreEleve=0;
    $max=0;
    $min=0;
    $premierTour= true;

    foreach($notes as $nom=> $note){
    $sommeNote+= $note;
    $nombreEleve+= 1;

    if($premierTour){
            $max=$note;
            $min=$note;
            $premierTour= false;
    }else{
            if ($note > $max){
                $max = $note;
            }
            if($note < $min){
                $min = $note;
            }
    }
    }
    $moyenne = $sommeNote/$nombreEleve;
    echo "<br>";
    echo "Somme : " . $sommeNote . "<br>";
    echo "Moyenne : " . $moyenne . "<br>";
    echo "Note maximale : " . $max . "<br>";
    echo "Note minimale : " . $min . "<br>";

    echo "<br>";
    echo "Somme: " . array_sum($notes) . "<br>";
    echo "Nombre: " . count($notes) . "<br>";
    echo "Max: " . max($notes) . "<br>";
    echo "Min: " . min($notes) . "<br>";

    echo "<br>";
    $effictifs=[];
    foreach($notes as $nom=>$note){
        $m= mention($notes);

        if (isset($effectifs[$m])) {
            $effectifs[$m]++;
        } else {
            $effectifs[$m] = 1;
        }
    }
    echo "<pre>";
    print_r($effectifs);
    echo "</pre>";
    echo "<br>";

    //Exercice 3.4 : Tri

    function afficher($tab) {
        echo "<ul>";
        foreach ($tab as$nom => $note) {
            echo "<li><strong>$nom</strong> : $note</li>";
        }
        echo "</ul>";
    }

    //ksort:
    $knote= $notes;
    ksort($knote);
    afficher($knote);

    echo "<br>";
    //arsort:
    $arnote= $notes;
    arsort($arnote);
    afficher($arnote);

    echo "<br>";
    //krsort:
    $krnote= $notes;
    krsort($krnote);
    afficher($krnote);

    echo "<br>";
    //asort:
    $anote= $notes;
    asort($anote);
    afficher($anote);

    /*
    -Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?

    Pour un tableau indexé, on utilise :

    sort($modules) : pour trier les valeurs par ordre croissant (alphabétique ou numérique) et réindexer le tableau à partir de 0.

    rsort($modules) : pour trier les valeurs par ordre décroissant.
    */


    //Exercice 3.5 : Opérateurs de tableaux

    $a = ["x" => 1, "y" => 2];  
    $b = ["y" => 2, "x" => 1];
    $res= $a+$b ;   //$a + $b donne : ["x" => 1, "y" => 2] (contenu de $a)
    print_r($res);

    echo "<br>";
    $res1= $a==$b;  //$a == $b donne : true (vrai)
    echo "$res1";

    echo "<br>";
    $res1= $a===$b; #   $a === $b donne : false (faux)
    echo "$res1";

    /*
    $a + $b :
    L'opérateur + ajoute les éléments du tableau $b au tableau $a. Toutefois, les clés qui existent déjà dans le premier tableau ($a) ne sont pas écrasées par celles de $b. Comme les clés "x" et "y" sont déjà présentes dans $a, le résultat final conserve simplement les valeurs et l'ordre de $a.

    $a == $b :
    L'opérateur == renvoie true si les deux tableaux contiennent exactement les mêmes paires clé/valeur, peu importe l'ordre dans lequel elles ont été déclarées.

    $a === $b :
    L'opérateur === est plus strict. Il exige que les deux tableaux possèdent les mêmes paires clé/valeur, mais aussi qu'elles soient dans le même ordre exact et du même type. Vu que $a commence par "x" et $b commence par "y", l'ordre diffère, ce qui donne false.
    */

?>
<?php
    //Partie 4 : Fichiers externes et formulaires
    
        //Exercice 4.1 : Factorisation de l'interface
        require_once('includes/pied_inc.php');
        /*
            Experience 1:
                include : PHP génère un avertissement de type Warning, mais la suite du script continue de s'exécuter. 
                require : PHP génère une erreur fatale (Fatal Error), et l'exécution du script s'arrête immédiatement.   
            
            Experience 2: 
                En utilisant include deux fois : Le contenu du menu est inséré deux fois dans la page HTML, ce qui crée des doublons.
                En utilisant include_once : PHP vérifie si le fichier a déjà été chargé. S'il l'est déjà, il l'ignore, évitant ainsi toute duplication ou conflit de redéfinition.

        */
?>