<?php

// Étape 4 :
// Créer une page affichant le détail d’un film de manière dynamique. Si le film n’existe pas,
// une erreur sera affichée.

//  connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3',   // driver mysql : serveur ; nom de la BDD
                'root',    
                '',                    
                array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING,   
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')   
            );











?>