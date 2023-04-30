<div id="menu">
	<ul>
	
		<li class="<?php echo ( $pageAffiche == 'accueil' ? 'selected' : '' ); ?>">
			<a href="index.php?page=accueil">
				<span class="fa fa-home"></span>Accueil
			</a>
		</li>
		

		<?php
		$req =$pdo->query("SELECT * FROM `groupe` ORDER BY ORDRE");


		while($res =$req->fetch()){

	    //var_dump($_GET['id']);
		if(isset($_GET['id']) && $_GET['id']== $res['id']){

			echo '<li class="selected">'; 
				echo '<a href="index.php?page=groupe&id='.$res['id'].'">';
					echo '<span class="fa '.$res['icone'].'"></span>'.$res['label'].'';
				echo '</a>';
			echo '</li>'; 
		}else{


			echo '<li>'; 
				echo '<a href="index.php?page=groupe&id='.$res['id'].'">';
					echo '<span class="fa '.$res['icone'].'"></span>'.$res['label'].'';
				echo '</a>';
			echo '</li>'; 


		}
	}

		?>

		<li class="<?php echo ( $pageAffiche == 'message' ? 'selected' : '' ); ?>">
			<a href="index.php?page=message">
				<span class="fa fa-envelope"></span>Message
			</a>
		</li>



        <li class="<?php echo ( $pageAffiche == 'administration' ? 'selected' : '' ); ?>">
            <a href="index.php?page=administration">
                <span class="fa fa-cog"></span>Administration
            </a>
        </li>
		
	</ul>
	<br class="clear" />
</div>