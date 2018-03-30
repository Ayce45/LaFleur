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
                        <div class="table-scrol">
                            <h1 align="center">Categorie</h1>
                            <button class="btn btn-sucess" data-target="#createcategory" data-toggle="modal" ><i class="fa fa-plus"></i></button>
                            </br>
                            </br>
                            <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


                                <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                                    <thead>

                                        <tr>

                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            <th style="width:9%" ></th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $reponse = $bdd->query("SELECT * FROM categorie");
                                    while ($donnees = $reponse->fetch()) {
                                        ?>

                                        <tr>
                                            <!--here showing results in the table -->
                                            <td><?= $donnees["cat_code"] ?></td>
                                            <td><?= $donnees["cat_libelle"] ?></td>
                                            <td> <button class="btn btn-danger btn-sm"  onclick="window.location.href = 'deleteCategorie.php?id=<?= $donnees["cat_code"] ?>'" data-toggle="modal"><i class="fa fa-trash-o"></i></button>
                                            <button class="btn btn-info btn-sm"  onclick="window.location.href = '?id=<?= $donnees["cat_code"] ?>'" data-toggle="modal"><i class="fa fa-edit"></i></button> </td>
                                        </tr>

                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="modal fade in" tabindex="1" role="dialog" id="createcategory">        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="../ajax/addCategoryAdmin.php" data-toggle="validator">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">⚠ CREATION PRODUIT ⚠</h5>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span>Référence*         <label></label></span>
                                <input name="ref" type="text" required> 
                            </div>
                            <div>
                                <span>Désignation*<label></label></span>
                                <input name="desi" type="text" required> 
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Oui</button>                    
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>   
</body>

</html>
