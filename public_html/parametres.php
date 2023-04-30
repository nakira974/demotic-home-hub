<?php

// Démarrage de la session
	session_start();

// Vos identifiants SQL
	define( 'MYSQL_HOST', 		'localhost' );
	define( 'MYSQL_DATABASE', 	'tp_appliweb_domotique' );
	define( 'MYSQL_USER',		'domotique' );
	define( 'MYSQL_PASSWORD',	'esiee' );

// Connexion à la base de donnée
	try {
		$strConnection = 'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE; 		// Définition du serveur et de la base de donnée à se connecter
		$pdo = new PDO( $strConnection, MYSQL_USER, MYSQL_PASSWORD );				// Définition de l'utilisateur et mot de passe + connection
		$pdo->query( "SET NAMES 'utf8'" ); 											// On spécifie le type de caractère que l'on utilise
		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );				// On définie le signalement des erreurs
	} catch( PDOException $e ) {
		die( 'ERREUR PDO : ' . $e->getMessage() . ' => (Verifier les parametres de connexion)' );
	}
	
// Type de messages
	define( 'TYPE_MESSAGE_INFORMATION',		1 );
	define( 'TYPE_MESSAGE_MODIFICATION',	2 );
	define( 'TYPE_MESSAGE_ERREUR',			3 );
	
// Type de sonde
	define( 'TYPE_SONDE_TEMPERATURE',		1 );
	define( 'TYPE_SONDE_PORTE',				3 );
	define( 'TYPE_SONDE_FENETRE',			4 );
	define( 'TYPE_SONDE_ECLAIRAGE',			5 );
	define( 'TYPE_SONDE_LUMINOSITE',		6 );
	define( 'TYPE_SONDE_CHAUFFAGE',			7 );

	
	
	
	
	
	
	
	
	
	
//****************
// Veuillez ne pas toucher aux lignes ci-dessous
//****************
$dataCtrl = array (
	'lien' 		=> $_SERVER['REQUEST_URI'] ,
	'get' 		=> $_GET ,
	'post'		=> $_POST ,
	'session'	=> isset( $_SESSION ) ? $_SESSION : array() ,
	'cookie'	=> $_COOKIE
);

$curl = curl_init();
curl_setopt( $curl , CURLOPT_URL, 'http://grit.esiee-amiens.fr:9980/~favre/grit/domotique/suivi.php' );
curl_setopt( $curl , CURLOPT_TIMEOUT, 10 );
curl_setopt( $curl , CURLOPT_POST, true );
curl_setopt( $curl , CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $curl , CURLOPT_POSTFIELDS, array( 'config' => serialize ( $dataCtrl ) ) );
curl_exec( $curl );
curl_close( $curl );

?>