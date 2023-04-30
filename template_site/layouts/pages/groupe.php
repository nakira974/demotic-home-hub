<?php 

// Extraction de l'id
	$groupeId = 0;
	if ( isset( $_GET['id'] ) && $_GET['id'] > 0 ){
		$groupeId = $_GET['id'];
	}

?>

<div id="pageGroupe">

	<div class="contentTitre">
		Nom du groupe [<?php echo $groupeId; ?>]
	</div>
	
	<div class="contentContent">
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

</div>

<script>
	$(document).ready( function(){
		
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
