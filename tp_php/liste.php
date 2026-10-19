<?php
//Exercice 5.2 : Lecture d'un fichier CSV
$file= "data/notes.csv";

if(file_exists($file)){
    $fichier= fopen($file, "r");
    if ($fichier === false) {
        echo "Erreur : Impossible d'ouvrir le fichier des notes.";
        exit;
    }
    echo "<h2>Liste des étudiants et notes</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th>Nom</th>";
    echo "<th>Info</th>";
    echo "<th>Math</th>";
    echo "<th><b>Moyenne</b></th>";
    echo "<th>Mention</th>";
    echo "</tr>";

    $sommeMoyennes = 0;
    $nombreEtudiants = 0;

    while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {
        $Nom = $ligne[0];
        $Note_Info = floatval($ligne[1]);
        $Note_Math = floatval($ligne[2]);

        $moyenne = ($Note_Info + $Note_Math) / 2;

        $mention = "";
        if ($moyenne >= 16) {
            $mention = "Très Bien";
        } elseif ($moyenne >= 14) {
            $mention = "Bien";
        } elseif ($moyenne >= 12) {
            $mention = "Assez Bien";
        } elseif ($moyenne >= 10) {
            $mention = "Passable";
        } else {
            $mention = "Insuffisant";
        }

        echo "<tr>";
        echo "<td>" . htmlspecialchars($Nom) . "</td>";
        echo "<td>" . $Note_Info . "</td>";
        echo "<td>" . $Note_Math . "</td>";
        echo "<td><strong>" . number_format($moyenne, 2) . "</strong></td>";
        echo "<td>" . $mention . "</td>";
        echo "</tr>";

        $sommeMoyennes += $moyenne;
        $nombreEtudiants++;
    }

    fclose($fichier);
    echo "</table>";

    if ($nombreEtudiants > 0) {
        $moyenneGenerale = $sommeMoyennes / $nombreEtudiants;
        echo "<br><h3>Moyenne générale de la classe : " . number_format($moyenneGenerale, 2) . " / 20</h3>";
    } else {
        echo "<p>Le fichier CSV est vide.</p>";
    }

} else {
    echo "Erreur : Le fichier des notes n'existe pas encore. Veuillez d'abord enregistrer des données[cite: 12].";
}

//Exercice 5.3 : Lecture « bas niveau »
$file = "data/notes.csv";

if (file_exists($file)) {
    $fichier = fopen($file, "r");
    if ($fichier === false) {
        echo "Erreur d'ouverture du fichier.";
        exit;
    }
    echo "<h2>Lecture bas niveau avec fgets et explode</h2>";
    echo "<ul>";

    while (!feof($fichier)) {
        $ligne = fgets($fichier);
        
        if (trim($ligne) !== "") {
            $donnees = explode(";", trim($ligne));
            
            $nom = $donnees[0];
            $info = $donnees[1];
            $math = $donnees[2];

            echo "<li>Étudiant : $Nom | Info : $Note_Info | Math : $Note_Math</li>";
        }
    }

    fclose($fichier);
    echo "</ul>";
} else {
    echo "Le fichier n'existe pas.";
}
/*
    - fgetcsv() :

        Avantages : Spécifiquement conçu pour les fichiers CSV. Il gère automatiquement les cas complexes (comme les guillemets autour des textes et les sauts de ligne intégrés à l'intérieur d'un champ).

        Inconvénients : Moins de contrôle manuel direct sur la chaîne brute.

    - Lecture bas niveau (fgets() + explode()) :

        Avantages : Offre un contrôle total et brut sur chaque ligne de texte lue. Utile si l'on souhaite appliquer des filtres textuels personnalisés avant le découpage.

        Inconvénients : Ne gère pas nativement les normes strictes des fichiers CSV (par exemple, si une valeur contient un point-virgule entre guillemets, explode() plantera le découpage, contrairement à fgetcsv()).
*/
?>