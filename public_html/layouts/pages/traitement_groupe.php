<?php

require ('parametres.php');



$req = $pdo->prepare('INSERT INTO groupe (label, ordre, icone) VALUES(?,?,?)');
$req->execute(array($_POST['label'], $_POST['ordre'], $_POST['icone']));


header('Location: index.php?page=administration');


