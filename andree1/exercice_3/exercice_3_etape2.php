<?php

// Étape 2 :
// Créer un formulaire permettant d’ajouter un film et effectuer les vérifications nécessaires.
// Prérequis :
// ● Les champs “titre, nom du réalisateur, acteurs, producteur et synopsis” comporteront
// au minimum 5 caractères.
// ● Les champs : année de production, langue, category, seront obligatoirement un
// menu déroulant
// ● Le lien de la bande annonce sera obligatoirement une URL valide
// ● En cas d’erreurs de saisie, des messages d’erreurs seront affichés en rouge
// Chaque film sera ajouté à la base de données créée. Un message de réussite confirmera
// l’ajout du film.


$message = false ;
//var_dump($_POST);

//  connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3',   // driver mysql : serveur ; nom de la BDD
                'root',    
                '',                    
                array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING,   
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')   
            );

// Traitement du formulaire :
    if (!empty($_POST)) {  // si le formulaire est soumis

        // Validation des champs du formulaire :
        if (!isset($_POST['title']) || strlen($_POST['title']) < 5 ) $message .= '<div class="bg-danger">Le titre doit contenir 5 caractères minimum.</div>';

        if (!isset($_POST['director']) || strlen($_POST['director']) < 5 ) $message .= '<div class="bg-danger">Le nom du réalisateur doit contenir 5 caractères minimum.</div>';

        if (!isset($_POST['actors']) || strlen($_POST['actors']) < 5 ) $message .= '<div class="bg-danger">Le nom des acteurs doit contenir 5 caractères minimum.</div>';

        if (!isset($_POST['producer']) || strlen($_POST['producer']) < 5 ) $message .= '<div class="bg-danger">Le le nom du producteur doit contenir 5 caractères minimum.</div>';

        if (!isset($_POST['storyline']) || strlen($_POST['storyline']) < 5 ) $message .= '<div class="bg-danger">Le synopsis doit contenir 5 caractères minimum.</div>';



    //Insertion en BDD si il n'y a pas de message d'erreur :
    if (empty($message)) {   // si $message est vide, c'est qu'il n'y a pas d'erreur

        // On échappe toutes les valeurs de $_POST :
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars ($valeur, ENT_QUOTES);
        }

        // on fait une requête préparée :
        $result = $pdo->prepare("INSERT INTO movies ( title, director, actors, producer, storyline) VALUES ( :title, :director, :actors, :producer, :storyline) ");

        $result->bindParam(':title', $_POST['title']);
        $result->bindParam(':director', $_POST['director']);
        $result->bindParam(':actors', $_POST['actors']);
        $result->bindParam(':producer', $_POST['producer']);
        $result->bindParam(':storyline', $_POST['storyline']);


        $req = $result->execute();    

        // Afficher un message de réussite ou d'échec :
        if ($req) {
            $message .= '<div>Votre film a bien été enregistré.</div>';
        } else {
            $message .= '<div>Votre film n\'est pas enregistré.</div>';
        }   
    }   // fin du if (empty($message))

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice 3</title>
</head>
<body>
    <h1>Adding a movie :</h1>

   <?php echo $message; ?>

<form method="post" action="">

    <label for="title">Title</label><br>
    <input type="text" id="title" name="title" value="" ><br><br>

    <label for="director">Director</label><br>
    <input type="text" id="director" name="director" value=""><br><br>

    <label for="actors">Actors</label><br>
    <input type="text" id="actors" name="actors" value="" ><br><br>

    <label for="producer">Producer</label><br>
    <input type="text" id="producer" name="producer" value=""><br><br>

    <label for="storyline">Storyline</label><br>
    <textarea name="storyline" id="storyline"></textarea><br><br>

    <label for="year_of_prod">year_of_prod  :</label><br><br>
    <select name="year_of_prod" id="year_of_prod">
        <option placeholder="Sélectionnez" disabled>Sélectionnez :</option>

        <?php
        $annees = 1890;
        while($annees <= 2018) {
            echo "<option>$annees</option>";
            $annees++;
        }
        ?>  

    </select><br><br>

    <label for="language">Language :</label><br><br>
    <select name="" id="">
        <option placeholder="Sélectionnez" disabled>Sélectionnez :</option>
        <option value="">English</option>
        <option value="">French</option>
        <option value="">Japonese</option>

    </select>


    <label for="category">Category :</label><br><br>
    <select name="" id="">
        <option placeholder="Sélectionnez" disabled>Sélectionnez :</option>
        <option value="">fantastique</option>
        <option value="">comique</option>
        <option value="">romantique</option>
        <option value="">historique</option>

    </select><br><br>

    <label for="">Video</label><br><br>
    <textarea name="video" id="video"></textarea><br><br>

    <input type="submit" value="Add">

</form>
    
</body>
</html>