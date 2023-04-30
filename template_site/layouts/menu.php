<div id="menu">
	<ul>
	
		<li class="<?php echo ( $pageAffiche == 'accueil' ? 'selected' : '' ); ?>">
			<a href="index.php?page=accueil">
				<span class="fa fa-home"></span>Accueil
			</a>
		</li>
		
		<li>
			<a href="index.php?page=groupe&id=1">
				<span class="fa fa-bed"></span>Chambre 1
			</a>
		</li>
		
		<li>
			<a href="index.php?page=groupe&id=2">
				<span class="fa fa-bed"></span>Chambre 2
			</a>
		</li>
		
		<li>
			<a href="index.php?page=groupe&id=3">
				<span class="fa fa-bed"></span>Chambre 3
			</a>
		</li>
		
		<li>
			<a href="index.php?page=groupe&id=4">
				<span class="fa fa-cutlery"></span>Cuisine
			</a>
		</li>
		
		<li>...</li>

		<li class="<?php echo ( $pageAffiche == 'message' ? 'selected' : '' ); ?>">
			<a href="index.php?page=message">
				<span class="fa fa-envelope"></span>Message
			</a>
		</li>
		
	</ul>
	<br class="clear" />
</div>
		