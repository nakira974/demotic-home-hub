<?php

// Inclusion du fichier de paramétre
	require ( 'parametres.php' );
	
// Détermination de la page à afficher
	$pageAffiche = 'accueil';
	if ( isset( $_GET['page'] ) && $_GET['page'] != '' && file_exists( 'layouts/pages/' . $_GET['page'] . '.php' ) ){
		$pageAffiche = $_GET['page'];
	}

// Appel de l'entete de la page
	require ( 'layouts/header.php' );

// Appel du menu
	require ( 'layouts/menu.php' );

// Gestion du contenu de la page
	echo '<div id="content">';
		require ( 'layouts/pages/' . $pageAffiche . '.php' );
	echo '</div>';

// Appel du footer
	require ( 'layouts/footer.php' );

?>