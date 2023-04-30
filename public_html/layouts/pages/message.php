<div id="pageMessage">

	<div class="contentTitre">
		Message
	</div>






	<div class="contentContent">
		<div class="dataTableContainer">
			<table id="messageTable" class="stripe row-border dataTable">
			
				<thead>
					<tr>
						<th>Type</th>
						<th>Sonde</th>
						<th>Groupe - Type</th>
						<th>Message</th>
						<th>Date</th>
					</tr>
				</thead>
							
				<tbody>

                <?php


                $query = $pdo->query("SELECT message.sonde_id, message.message, message.type_message_id, message.date_creation, sonde.id, sonde.label, sonde.groupe_id, groupe.id, groupe.icone, groupe.label 
                                                FROM message 
                                                INNER JOIN sonde ON message.sonde_id = sonde.id 
                                                INNER JOIN groupe ON sonde.groupe_id = groupe.id");

                while($res = $query->fetch()){
                   // var_dump($res);
					echo '<tr>';
					echo '<td class="textCenter fontSize20"><span class="fa '. $res['icone'] . '"></span></td>';
					//echo	'<td>Label</td>';
                    echo '<td class="textCenter"> '. $res['label'] . ' </td>';
					//echo	'<td>. $res[''] .</td>';
					//echo 	'<td>Groupe</td>';
                    echo '<td class="textCenter"> '. $res['groupe_id'] . '<p> </p> '. $res['label'] . ' </td>';

					//echo '<td>Message</td>';
					echo '<td class="textCenter"> '. $res['message'] . ' </td>';

					//echo '	<td>Date</td>';

                    echo '<td class="textCenter"> '. $res['date_creation'] . ' </td>';
					echo '</tr>';

                }

                 ?>


<!--<tr>-->
<!--    <td class="textCenter fontSize20">Icone</td>-->
<!--    <td>Label</td>-->
<!--    <td>Groupe</td>-->
<!--    <td>Message</td>-->
<!--    <td>Date</td>-->
<!--</tr>-->
<!--<tr>-->
<!--                    <td class="textCenter fontSize20">Icone</td>-->
<!--                    <td>Label</td>-->
<!--                    <td>Groupe</td>-->
<!--                    <td>Message</td>-->
<!--                    <td>Date</td>-->
<!--                </tr>-->

<?php
//echo '<tr>';
//        echo '<td>lllll</td>';
//        echo '<td>lllll</td>';
//        echo '<td>lllll</td>';
//        echo '<td>lllll</td>';
//        echo '<td>lllll</td>';
//        echo '</tr>';
//        ?>
				</tbody>



							
			</table>
		</div>
	</div>
	
</div>

<script>
    $(document).ready( function(){


        $("#messageTable").DataTable();

    });
</script>