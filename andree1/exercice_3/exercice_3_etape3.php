<?php

// Étape 3 :
// Créer une page listant dans un tableau HTML les films présents dans la base de données.
// Ce tableau ne contiendra, par film, que le nom du film, le réalisateur et l’année de
// production.
// Une colonne de ce tableau contiendra un lien « plus d’infos » permettant de voir la fiche
// d’un film dans le détail.

// $contenu -> permet de déclarer la variable contenu dans le passage php du HTML
$contenu ='';

// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3',   // driver mysql : serveur ; nom de la BDD
                'root',    // pseudo de la BDD
                '',    // mot de passe de la BDD ('root' pour Mac)
                array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING,   // option 1 : pour afficher les erreurs SQL
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')    //option2 : définit le jeu de caractères des échange avec la BDD
            );

$resultat = $pdo->query("SELECT id_movies, title, director, year_of_prod FROM movies");

$contenu .= '<table border="1">';
    // La ligne d'entêtes:
    $contenu .=  '<tr>';
    $contenu .=  '<th>Nom du film</th>';
    $contenu .=  '<th>Réalisateur</th>';
    $contenu .=  '<th>Année de production</th>';

    $contenu .=  '<th>Autres infos</th>';
    $contenu .=  '</tr>';
    $contenu .=  '</tr>';

    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        //print_r($ligne);
        $contenu .= '<tr>';

        $contenu .= '<td>' . $ligne['title'] . '</td>';
        $contenu .= '<td>' . $ligne['director'] . '</td>';
        $contenu .= '<td>' . $ligne['year_of_prod'] . '</td>';

        $contenu .= '<td><a href="?id_movies='. $ligne['id_movies'] .'">autres infos</a></td>';  
    }

$contenu .= '</table>';

// 3- traitement de $_GET

if (isset($_GET['id_movies'])) {   // si il existe l'indice "id_contact" dans $_GET, c'est que cet indice est passé dans l'url, donc que l'internaute à cliqué sur un lien "autres infos"

    $_GET['id_movies'] = htmlspecialchars ( $_GET['id_movies'], ENT_QUOTES);

    // on fait une requête préparée :
$result = $pdo->prepare("SELECT * FROM movies WHERE id_movies = :id_movies");

$result->bindParam(':id_movies', $_GET['id_movies']);

$result->execute();   

$infos = $result->fetch(PDO::FETCH_ASSOC);  // on transforme l'objet $resultat en un array associatif $infos. Pas de boucle car on n'a qu'un seul résultat ici

// print_r($infos);

if (!empty($infos)) {   // si $infos est vide, c'est que l'id_movies n'existe pas (ou plus)
    //  foreach ($infos as $valeur) {
    //     $contenu .= '<p>'. $valeur . '</p>';
    //  }

    $contenu .= '<p> Titre : ' . $infos['title'] . '</p>';
    $contenu .= '<p> Réalisateur : ' . $infos['director'] . '</p>';
    $contenu .= '<p> Acteur : ' . $infos['actor'] . '</p>';
    $contenu .= '<p> Producteur: ' . $infos['producer'] . '</p>';
    $contenu .= '<p> Année de production : ' . $infos['year_of_prod'] . '</p>';
    $contenu .= '<p> Langue : ' . $infos['language'] . '</p>';
    $contenu .= '<p> Synopsis : ' . $infos['storyline'] . '</p>';
    $contenu .= '<p> Catégorie : ' . $infos['category'] . '</p>';
    $contenu .= '<p> Vidéo : ' . $infos['video'] . '</p>';

} else {
    $contenu .= '<p> Ce contact n\'existe pas !</p>';
}

}   // fin de if (isset($_GET['id_contact']))



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des films</title>
</head>
<body>
    <h1>Liste des films</h1>
           <?php echo $contenu; ?>
        
        
    
</body>
</html>