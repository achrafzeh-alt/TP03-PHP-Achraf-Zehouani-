<?php
// Exercice 4.3 : Formulaire en POST

@$Nom = $_POST['Nom'];
@$Note_Info= $_POST['Note_Info'];
@$Note_Math= $_POST['Note_Math'];
define('Note_Max', 20);
define('Note_Min',0);

if(isset($_POST['Nom']) and isset($_POST['Note_Info']) and isset($_POST['Note_Math'])){

    if(empty($_POST['Nom']) or empty($_POST['Note_Info']) or empty($_POST['Note_Math'])){
    
        echo "Erreur: Toutes les champs doivent etre remplis. ";
    }else{
            
            if ($Note_Info >= Note_Min && $Note_Info <= Note_Max && $Note_Math >= Note_Min && $Note_Math <= Note_Max) {
                $nom_securise = htmlspecialchars($Nom);
                $note_info_securise = htmlspecialchars($Note_Info);
                $note_math_securise = htmlspecialchars($Note_Math);
            
                echo "<h2><u> Récapitulatif des notes : </u></h2>";
                echo "Nom : " . $nom_securise . "<br>";
                echo "Note Informatique : " . $note_info_securise . "<br>";
                echo "Note Mathématiques : " . $note_math_securise . "<br>";
            }else{
                echo "Erreur : Les notes doivent être comprises entre " . Note_Min . " et " . Note_Max . ".";
            }
    }
}else{
    echo "Erreur : Le formulaire n'a pas été soumis correctement.";
}

/* 
   1-
    Pourquoi préférer POST à GET pour un mot de passe ? :
        * La méthode GET transmet les données directement dans l'URL, ce qui les rend visibles par tout le monde.

        * La méthode POST transmet les données de manière invisible dans le corps de la requête HTTP, ce qui protège les données sensibles comme les mots de passe.
    
    2-
    Que contient $_REQUEST ?
        * La variable superglobale $_REQUEST est un tableau associatif qui combine par défaut le contenu de $_GET, $_POST et $_COOKIE. Elle permet de récupérer des données transmises par l'une ou l'autre de ces méthodes de manière transparente.
*/


?>