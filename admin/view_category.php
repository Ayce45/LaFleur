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
                                            <td> <button class="btn btn-danger btn-sm"  data-target="#deleteCat<?= $donnees["cat_code"] ?>" data-toggle="modal"><i class="fa fa-trash-o"></i></button>
                                                <button class="btn btn-info btn-sm"  data-target="#modifyCat<?= $donnees["cat_code"] ?>" data-toggle="modal"><i class="fa fa-edit"></i></button> </td>
                                        </tr>
                                        <div class="modal fade in" tabindex="1" role="dialog" id="modifyCat<?= $donnees["cat_code"] ?>">        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="ajax/modifyCat.php">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center">⚠ Modification catégorie ⚠</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <span>Référence*         <label></label></span>
                                                                <input name="code" type="hidden" value="<?= $donnees["cat_code"] ?>" >
                                                                <input name="code2" type="text" value ="<?= $donnees["cat_code"] ?>"> 
                                                            </div>
                                                            <div>
                                                                <span>Désignation*<label></label></span>
                                                                <input name="name" type="hidden" value="<?= $donnees["cat_libelle"] ?>">
                                                                <input name="name2" type="text" value="<?= $donnees["cat_libelle"] ?>">
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" onclick="window.location.href = 'ajax/modifyCat.php?id=<?= $donnees["cat_code"] ?>'" class="btn btn-primary">Oui</button>                    
                                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade in" tabindex="-1" role="dialog" id="deleteCat<?= $donnees["cat_code"] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center">⚠ ATTENTION ⚠</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">Etes-vous sûr(e) de vouloir supprimer cete magnifique categorie ?</p>
                                                        <p class="text-center"> Cela va aussi supprimer tout les produits de cette categorie ! </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'ajax/deleteCategorie.php?id=<?= $donnees["cat_code"] ?>'" data-dismiss="modal">Oui, supprimer</button>
                                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                    <form method="POST" action="ajax/addCategoryAdmin.php" data-toggle="validator">
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
