<?php
// Exercice 1 : « On se présente ! »
// Créer un tableau en PHP contenant les infos suivantes :
// ● Prénom
// ● Nom
// ● Adresse
// ● Code Postal
// ● Ville
// ● Email
// ● Téléphone
// ● Date de naissance au format anglais (YYYY-MM-DD)
// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
// La date sera affichée au format français (DD/MM/YYYY).
// Bonus :
// Gérer l’affichage de la date de naissance à l’aide de la classe DateTime


//Déclarer un array :
$infos = array('Prénom' => 'Eden',
                'Nom'   => 'Dupont',
                'Adresse' => '5, rue de la Plage',
                'Code Postal' => '97180',
                'Ville' => 'Sainte-Anne',
                'Email' => 'edend@yahoo.com', 
                'Téléphone' => '014852266342',
                'Date de naissance' => '2016-12-05');  


//Pour afficher rapidement le contenu de ce tableau :
// echo '<pre>';
//     var_dump($infos);  
// echo '</pre>';  


echo '<ul>';
foreach ($infos as $indice => $valeur) {   // Quand il y a 2 variables après "as" la première parcourt toujours les Indices la seconde parcourt toujours les VALEURS.
    echo '<li>' . ucfirst((str_replace(' ',' ',$indice)). ' : <strong>' . $valeur . '</strong></li><br>';    
}
echo '</ul>';



// Convertir une date d'un format vers un autre :
$date = '2016-12-05';

$objetDate = new DateTime($date);
echo 'La date au format français : ' . $objetDate->format('d-m-Y') .' .' ;    // la méthode format() permet de convertir un objet date selon le format indiqué





?>