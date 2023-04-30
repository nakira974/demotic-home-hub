<?php

require ('parametres.php');



$req = $pdo->prepare('INSERT INTO sonde (code, label, type_sonde_id, groupe_id, valeur) VALUES(?,?,?,?,?)');
$req->execute(array($_POST['c_sonde'], $_POST['nom'], $_POST['t_sonde'], $_POST['g_sonde'], $_POST['valeur']));


header('Location: index.php?page=administration');


