<?php 

// Extraction de l'id
	$groupeId = 0;
	if ( isset( $_GET['id'] ) && $_GET['id'] > 0 ){
		$groupeId = $_GET['id'];
	}
?>

<div id="pageGroupe">

	<div class="contentTitre">

		<?php 

		$req = $pdo->query("SELECT * FROM `groupe` ORDER BY ORDRE");

        while ($test = $req->fetch()){

        if ($groupeId == $test['id']) {

        echo "Nom du groupe ". $test['label'];

        }

        }

        ?>
	
    </div>
	
    <div class="contentContent">


         <?php

         $sonde = $pdo->query("SELECT * FROM `sonde` ORDER BY `groupe_id` ASC");

         while($mdr = $sonde->fetch()){

                if($mdr['groupe_id'] == $groupeId){

                   echo '<div class="sonde typeSonde' . $mdr['type_sonde_id'] . ' " data-sonde-id="'. $mdr['id'] . '">';
                          echo  '<div class="titre">' . $mdr['label'] . '</div>';
                            echo '<div class="content">';
                                echo '<div class="imageSeule">';
                                $xmen =  intval($mdr['type_sonde_id']);
                                switch ($xmen){

                                                case '1': echo '<img src="img/thermometre.png">';
                                                		  echo '</div>';
                                                		  echo $mdr['valeur'];

                                                         break;
                                                case '2': echo '<img src="img/porte_ouverte.png">';
                                                		  echo '</div>';
                                                		  echo $mdr['valeur'];


                                                		  echo  '<div class="blocBtn">';
						                                  echo '<input name="btnLampe" value="Fermer" type="button">';
						                               	  echo  '</div>';

                                                        break;
                                                case '3': if($mdr['valeur'] == 1){



                                                    echo '<img src="img/porte_ouverte.png">';
                                                    echo '</div>';
                                                    echo '<div class="blocBtn">';
                                                    echo '<input name="btnPorte" value="Fermer" type="button">';
                                                    echo '</div>';

                                                } else {



                                                    echo '<img src="img/porte_ferme.png">';
                                                    echo '</div>';
                                                    echo '<div class="blocBtn">';
                                                    echo '<input name="btnPorte" value="Ouvrir" type="button">';
                                                    echo '</div>';



                                                }
                                                        
                                                     break;
                                                case '4': if($mdr['valeur'] == 1) {

                                                          echo '<img src="img/volet_ouvert.png">';
                                                          echo '</div>';
                                                          echo '<div class="blocBtn">';
                                                          echo '<input type="image" src="img/sort_asc_disabled.png" name="BoutonO" id="BoutonOuvrir">';
                                                          echo '<input type="image" src="img/sort_desc.png" name="BoutonF" id="BoutonFermer">';
                                                          echo '</div>';
                                                } else if ($mdr['valeur'] == 0.5){

                                                          echo '<img src="img/volet_moitie_ouvert.png">';
                                                          echo '</div>';
                                                          echo '<div class="blocBtn">';
                                                          echo '<input type="image" src="img/sort_asc.png" name="BoutonO" id="BoutonOuvrir">';
                                                          echo '<input type="image" src="img/sort_desc.png" name="BoutonF" id="BoutonFermer">';
                                                          echo '</div>';

                                                } else if  ($mdr['valeur'] == 0){

                                                          echo '<img src="img/volet_ferme.png">';
                                                          echo '</div>';
                                                          echo '<div class="blocBtn">';
                                                          echo '<input type="image" src="img/sort_asc.png" name="BoutonO" id="BoutonOuvrir">';
                                                          echo '<input type="image" src="img/sort_desc_disabled.png" name="BoutonF" id="BoutonFermer">';
                                                          echo '</div>';





                                                }

                                                		 
                                                    break;
                                                case '5': if($mdr['valeur'] == 1){
                                                          echo '<img src="img/lampe_allumee.png">';
                                                		  echo '</div>';
                                                		  echo  '<div class="blocBtn">';

                                    				      echo '<input name="btnLampe" value="Eteindre" type="button">';
                                                          echo  '</div>';
                                                }else{
                                                          echo '<img src="img/lampe_eteinte.png">';
                                                          echo '</div>';
                                                          echo  '<div class="blocBtn">';

                                                          echo '<input name="btnLampe" value="Allumer" type="button">';
                                                          echo  '</div>';
                                                }
                                                     break;
                                                case '6': echo '<img src="img/luminosite.png">';
                                                		  echo '</div>';
                                                		  echo '<h4>' . $mdr['valeur'] . '%</h4>';
                                                		
                                                     break;
                                                case '7':   echo '<img src="img/thermometre.png">';
                                                			echo '</div>';
                                                			echo  '<div class="blocBtn">';
                                                            echo '<input name="btnChaufAug" class="btn btn-success" value="+" style="height: 35px; width: 35px; margin-top: -100px; background-color: #28a745; " type="button">';
                                                            echo  '</div>';
                                                            echo  '<div class="blocBtn">';
                                    				        echo '<input name="btnChaufBai" class="btn btn-danger" value="-" style="height: 35px; width: 35px; background-color: #dc3545;" type="button">';
                                                            echo  '</div>';
                                                			echo '<p id ="valChauffage">'. $mdr['valeur']. '</p>' ;
                                                			
                                                     break;
                                                default: echo '<p>Erreur</p>';
                                }



                            echo '</div>';
                        echo '</div>';




                }







}



         ?>
		
	<!--	
		<div class="sonde typeSonde5" data-sonde-id="3">
			<div class="titre">Lampe du plafond</div>
			<div class="content">
				<div class="imageSeule">
					<img src="img/lampe_eteinte.png">
				</div>
				<div class="blocBtn">
					<input name="btnLampe" value="Allumer" type="button">
				</div>
			</div>
		</div>
	</div>

	-->


    </div>

</div>

<script>
	$(document).ready( function(){






        $('#pageGroupe').on( 'click', 'input[name="BoutonO"]', function( e ){
            // Stop la propagation
            e.preventDefault();

            // Récupération du parent
            var parent = $(this).parents('.sonde');

            // Récupérationde l'id de la sonde
            var sondeId = parent.data('sonde-id');
            var valVolet = parent.find('#valvolets');


            // Envoi des données au serveur
            $.ajax({
                url			: 'ajax/update_volet.php',
                type		: 'POST',
                data		: {
                    sonde_id	: sondeId,
                    action : "ouvrir"
                },
                dataType	: 'json',
                success		: function( response ){
                    console.log(response);
                    // Gestion de la réponse
                    resultId = parseInt( response.result );
                    if ( resultId > 0 ){
                        if ( response.newValeur == 1 ){
                            console.log(response.newValeur);
                            parent.find('.imageSeule img').attr('src', 'img/volet_ouvert.png');


                        } else if( response.newValeur == 0.5 ) {
                            console.log(response.newValeur);
                            parent.find('.imageSeule img').attr('src', 'img/volet_moitie_ouvert.png');

                        }
                    } else {
                        alert('Erreur lors de la mise à jour du volet');
                    }
                }
            });
        });



        $('#pageGroupe').on( 'click', 'input[name="BoutonF"]', function( e ){
            // Stop la propagation
            e.preventDefault();

            // Récupération du parent
            var parent = $(this).parents('.sonde');

            // Récupérationde l'id de la sonde
            var sondeId = parent.data('sonde-id');
            var valVolet = parent.data('#valvolets');


            // Envoi des données au serveur
            $.ajax({
                url			: 'ajax/update_volet.php',
                type		: 'POST',
                data		: {
                    sonde_id	: sondeId,
                    action : "fermer"
                },
                dataType	: 'json',
                success		: function( response ){
                    // Gestion de la réponse
                    resultId = parseInt( response.result );
                    if ( resultId > 0 ){
                        if ( response.newValeur == 0 ){
                            parent.find('.imageSeule img').attr('src', 'img/volet_ferme.png');
                            console.log(response.newValeur);
                        } else if (response.newValeur ==0.5) {
                            console.log(response.newValeur);
                            parent.find('.imageSeule img').attr('src', 'img/volet_moitie_ouvert.png');
                        }
                    } else {
                        alert('Erreur lors de la mise à jour du volet');
                    }
                }
            });
        });




        $('#pageGroupe').on( 'click', 'input[name="btnChaufAug"]', function( e ){
            // Stop la propagation
            e.preventDefault();

            // Récupération du parent
            var parent = $(this).parents('.sonde');

            // Récupérationde l'id de la sonde
            var sondeId = parent.data('sonde-id');

            var valC = parent.find('#valChauffage');

            // Envoi des données au serveur
            $.ajax({
                url			: 'ajax/update_chauffage.php',
                type		: 'POST',
                data		: {
                    sonde_id	: sondeId,
                    action : "augmenter"
                },
                dataType	: 'json',
                success		: function( response ){
                    // Gestion de la réponse
                    resultId = parseInt( response.result );
                    if ( resultId > 0 ){
                        console.log(response.newValeur);
                        valC.text(response.newValeur);
                    } else {
                        alert('Erreur lors de la mise à jour du chauffage !');
                    }
                }
            });
        });




		$('#pageGroupe').on( 'click', 'input[name="btnChaufBai"]', function( e ){
			// Stop la propagation
				e.preventDefault();

			// Récupération du parent
				var parent = $(this).parents('.sonde');

			// Récupérationde l'id de la sonde
				var sondeId = parent.data('sonde-id');

                var valC = parent.find('#valChauffage');

			// Envoi des données au serveur
				$.ajax({
					url			: 'ajax/update_chauffage.php',
					type		: 'POST',
					data		: {
						sonde_id	: sondeId,
                        action : "baisser"
					},
					dataType	: 'json',
					success		: function( response ){
						// Gestion de la réponse
							resultId = parseInt( response.result );
							if ( resultId > 0 ){

                                console.log(response.newValeur);
                                valC.text(response.newValeur);

							} else {
								alert('Erreur lors de la mise à jour du chauffage !');
							}
					}
				});
		});

		
		$('#pageGroupe').on( 'click', 'input[name="btnPorte"]', function( e ){
			// Stop la propagation
				e.preventDefault();

			// Récupération du parent
				var parent = $(this).parents('.sonde');

			// Récupérationde l'id de la sonde
				var sondeId = parent.data('sonde-id');

			// Envoi des données au serveur
				$.ajax({
					url			: 'ajax/update_porte.php',
					type		: 'POST',
					data		: {
						sonde_id	: sondeId
					},
					dataType	: 'json',
					success		: function( response ){
						// Gestion de la réponse
							resultId = parseInt( response.result );
							if ( resultId > 0 ){
								if ( response.newValeur == 1 ){
									parent.find('.imageSeule img').attr('src', 'img/porte_ouverte.png');
									parent.find('input[name="btnPorte"]').val('Fermer');
								} else {
									parent.find('.imageSeule img').attr('src', 'img/porte_ferme.png');
									parent.find('input[name="btnPorte"]').val('Ouvrir');
								}
							} else {
								alert('Erreur lors de la mise à jour de la porte');
							}
					}
				});
		});








		$('#pageGroupe').on( 'click', 'input[name="btnLampe"]', function( e ){
			// Stop la propagation
				e.preventDefault();

			// Récupération du parent
				var parent = $(this).parents('.sonde');

			// Récupérationde l'id de la sonde
				var sondeId = parent.data('sonde-id');

			// Envoi des données au serveur
				$.ajax({
					url			: 'ajax/update_lampe.php',
					type		: 'POST',
					data		: {
						sonde_id	: sondeId
					},
					dataType	: 'json',
					success		: function( response ){
						// Gestion de la réponse
							resultId = parseInt( response.result );
							if ( resultId > 0 ){
								if ( response.newValeur == 1 ){
									parent.find('.imageSeule img').attr('src', 'img/lampe_allumee.png');
									parent.find('input[name="btnLampe"]').val('Eteindre');
								} else {
									parent.find('.imageSeule img').attr('src', 'img/lampe_eteinte.png');
									parent.find('input[name="btnLampe"]').val('Allumer');
								}
							} else {
								alert('Erreur lors de la mise à jour de la lampe');
							}
					}
				});
		});

    });
</script>
