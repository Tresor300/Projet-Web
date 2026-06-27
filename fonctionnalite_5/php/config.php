<?php
/**
 * config.php
 * ==========
 * Configuration globale du projet
 * Connexion MySQL + paramètres Python
 */


/* =====================================================
   CONFIGURATION BASE DE DONNÉES
===================================================== */

define("DB_HOST", "localhost");

define("DB_PORT", 3306);

define("DB_NAME", "tv_fowet");

define("DB_USER", "tv_fowet");

define("DB_PASS", "7AiiY5DG29yMMj1x");

define("DB_CHARSET", "utf8mb4");


/* =====================================================
   CONFIGURATION PYTHON
===================================================== */

/*
   Interpréteur Python
   Sur serveur école souvent python3
*/

define("PYTHON_BIN", "python3");


/*
   Dossier contenant scripts Python
   exemple :

   projet/
      php/
      python/
*/

define("PYTHON_DIR", realpath(__DIR__ . "/../python"));


/*
   Scripts IA
*/

define("SCRIPT_IMPLANTATION", "predict_implantation.py");

define("SCRIPT_PUISSANCE", "predict_puissance.py");


/*
   Temps max exécution python
*/

define("PYTHON_TIMEOUT", 30);



/* =====================================================
   CONNEXION PDO
===================================================== */

function get_db_connection()
{
    try {

        $dsn =

        "mysql:host=" . DB_HOST .

        ";port=" . DB_PORT .

        ";dbname=" . DB_NAME .

        ";charset=" . DB_CHARSET;


        $pdo = new PDO(

            $dsn,

            DB_USER,

            DB_PASS

        );


        /*
           Mode erreur → exceptions
        */

        $pdo->setAttribute(

            PDO::ATTR_ERRMODE,

            PDO::ERRMODE_EXCEPTION

        );


        /*
           Retour tableau associatif
        */

        $pdo->setAttribute(

            PDO::ATTR_DEFAULT_FETCH_MODE,

            PDO::FETCH_ASSOC

        );


        /*
           Sécurité SQL
        */

        $pdo->setAttribute(

            PDO::ATTR_EMULATE_PREPARES,

            false

        );


        return $pdo;
    }

    catch(PDOException $e){

        die(

            "Erreur connexion BDD : "

            . $e->getMessage()

        );
    }
}
?>