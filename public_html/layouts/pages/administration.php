<div id="pageMessage">






	<div class="contentTitre">Administration</div>
    <nav class="nav nav-tabs">
        <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Administration des groupes</a>
        <a class="nav-item nav-link" href="#p2" data-toggle="tab">Administration des sondes</a>
        <a class="nav-item nav-link" href="#p3" data-toggle="tab">Administration des utilisateurs</a>
    </nav>
    <div class="tab-content">
        <div class="tab-pane active" id="p1">


            <button type="button" data-toggle="modal" data-target="#infos" class="btn btn-primary">Ajouter groupe</button>
            <div class="modal fade" id="infos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="traitement_groupe.php" method="post">
                                <p>
                                    <label for="label">Label</label> : <input type="text" name="label" id="label" /><br />
                                    <label for="ordre">Ordre</label> : <input type="number" name="ordre" id="ordre" /><br />
                                    <label for="icone">Icone</label> : <input type="text" name="icone" id="icone" /><br />

                                    <input type="submit" value="Envoyer" />

                                </p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contentContent">
                <div class="dataTableContainer">
                    <table id="premierT" class="stripe row-border dataTable">

                        <thead>
                        <tr>
                            <th class="textCenter">Nom du groupe</th>
                            <th class="textCenter">Icone</th>
                            <th class="textCenter">Nombre de sondes associées</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php


                        $query = $pdo->query("SELECT label, icone  FROM `groupe`");

                        while($res = $query->fetch()){
                            // var_dump($res);
                            echo '<tr>';
                            echo '<td class="textCenter"><span class="fa '. $res['icone'] . '"></span></td>';
                            //echo	'<td>Label</td>';
                            echo '<td class="textCenter"> '. $res['label'] . ' </td>';
                            //echo	'<td>. $res[''] .</td>';
                            //echo 	'<td>Groupe</td>';
                           // echo '<td class="textCenter"> '. $res['groupe_id'] . '<p> </p> '. $res['label'] . ' </td>';


                            echo '</tr>';

                        }

                        ?>

                        </tbody>

                    </table>

            </div>

            </div>
        </div>

        <div class="tab-pane" id="p2">


            <button type="button" data-toggle="modal" data-target="#infos" class="btn btn-primary">Ajouter sonde</button>
            <div class="modal fade" id="infos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="traitement.php" method="post">
                                <p>

                                    <label for="label">Nom sonde</label> : <input type="text" name="nom" id="nom" /><br />

                                    <label for="ordre">Code sonde</label> : <input type="number" name="c_sonde" id="c_sonde" /><br />
                                    <label for="t_sonde">Type sonde</label> : <input type="number" name="t_sonde" id="t_sonde" /><br />
                                    <label for="g_sonde">Groupe associé</label> : <input type="number" name="g_sonde" id="g_sonde" /><br />
                                    <label for="valeur">Valeur actuel</label> : <input type="number" name="valeur" id="valeur" /><br />

                                    <input type="submit" value="Envoyer" />

                                </p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>



                <div class="dataTableContainer">
                    <table id="milieuT" class="stripe row-border dataTable">

                        <thead>
                        <tr>
                            <th class="textCenter">Nom de la sonde</th>
                            <th class="textCenter">Code de la sonde</th>
                            <th class="textCenter">Type de la sonde</th>
                            <th class="textCenter">Le groupe associé</th>
                            <th class="textCenter">Valeur actuel</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php


                        $requete = $pdo->query("SELECT * FROM `sonde`");

                        while($req = $requete->fetch()){
                            // var_dump($res);
                            echo '<tr>';
                            echo '<td class="textCenter"> '. $req['label'] . ' </td>';
                            //echo	'<td>Label</td>';
                            echo '<td class="textCenter"> '. $req['code'] . ' </td>';
                            //echo	'<td>. $res[''] .</td>';
                            echo '<td class="textCenter"> '. $req['type_sonde_id'] . ' </td>';
                            echo '<td class="textCenter"> '. $req['groupe_id'] . ' </td>';
                            echo '<td class="textCenter"> '. $req['valeur'] . ' </td>';
                            //echo 	'<td>Groupe</td>';
                            // echo '<td class="textCenter"> '. $res['groupe_id'] . '<p> </p> '. $res['label'] . ' </td>';


                            echo '</tr>';

                        }

                        ?>

                        </tbody>

                    </table>

            </div>
        </div>

        <div class="tab-pane" id="p3">


                <div class="dataTableContainer">
                    <table id="dernierT" class="stripe row-border dataTable">

                        <thead>
                        <tr>
                            <th class="textCenter">id</th>
                            <th class="textCenter">Nom</th>
                            <th class="textCenter">Prénom</th>
                            <th class="textCenter">Login</th>
                            <th class="textCenter">Label</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php


                        $requet = $pdo->query("SELECT * FROM `utilisateur` 
                                                           INNER JOIN type_utilisateur ON utilisateur.type_utilisateur_id = type_utilisateur.id");

                        while($req = $requet->fetch()){
                            // var_dump($res);
                            echo '<tr>';
                            echo '<td class="textCenter"> '. $req['id'] . ' </td>';
                            //echo	'<td>Label</td>';
                            echo '<td class="textCenter"> '. $req['nom'] . ' </td>';
                            //echo	'<td>. $res[''] .</td>';
                            echo '<td class="textCenter"> '. $req['prenom'] . ' </td>';
                            echo '<td class="textCenter"> '. $req['login'] . ' </td>';
                            echo '<td class="textCenter"> '. $req['label'] . ' </td>';


                            echo '</tr>';

                        }
                        ?>

                        </tbody>

                    </table>
            </div>
        </div>


        </div>















</div>

<script>
    $(document).ready( function(){
        //$("#premierT").DataTable();


        $("#milieuT").DataTable();
        $("#dernierT").DataTable();

    });
</script>