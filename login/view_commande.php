<?php
include 'header.php';
include 'connect.php';
?>
<body>
    <div class="container">
        <div class="row">
            <div class="box ">
                <div class="info">
                    <div class="table-scrol">
                        </br>
                        <h1 align="center">Commandes</h1>
                        </br>

                        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


                            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                                <thead>

                                    <tr>

                                        <th>Numéro de la commande</th>
                                        <th>Code client</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <?php
                                $reponse = $bdd->query("SELECT * FROM commande");
                                while ($donnees = $reponse->fetch()) {
                                    ?>                               

                                    <tr>
                                        <td><?= $donnees["cde_moment"] ?></td>
                                        <td><?= $donnees["cde_client"] ?></td>
                                        <td><?= $donnees["cde_date"] ?></td>
                                    </tr>

<?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</body>

</html>
