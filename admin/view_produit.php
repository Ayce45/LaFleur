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
                            <h1 align="center">Produits</h1>
                            <button class="btn btn-sucess" data-target="#createproduct" data-toggle="modal" ><i class="fa fa-plus"></i></button>
                            <button class="btn btn-sucess" data-target="#uploadimage" data-toggle="modal" ><i class="fa fa-image"></i></button>	
                            </br>
                            </br>
                            <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


                                <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                                    <thead>

                                        <tr>

                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $reponse = $bdd->query("SELECT * FROM produit");
                                    while ($donnees = $reponse->fetch()) {
                                        ?>

                                        <tr>
                                            <!--here showing results in the table -->
                                            <td><?= $donnees["pdt_ref"] ?></td>
                                            <td><?= $donnees["pdt_designation"] ?></td>
                                            <td><?= $donnees["pdt_prix"] ?></td>
                                            <td><?= $donnees["pdt_categorie"] ?></td>
                                            <td> <button class="btn btn-danger btn-sm"  onclick="window.location.href='deleteLigne.php?id=<?= $donnees["pdt_ref"] ?>'" data-toggle="modal"><i class="fa fa-trash-o"></i></button>	  </td>
                                        </tr>

                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="modal fade in" tabindex="1" role="dialog" id="createproduct">        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="../ajax/addProductAdmin.php">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">⚠ CREATION PRODUIT ⚠</h5>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span>Référence*         <label></label></span>
                                <input name="ref" type="text"> 
                            </div>
                            <div>
                                <span>Désignation*<label></label></span>
                                <input name="desi" type="text"> 
                            </div>
                            <div>
                                <span>Prix*<label></label></span>
                                <input name="prix" type="text"> 
                            </div>
                            <div>
                                <span>Nom de l'image*     <label></label></span>
                                <input name="image" type="text"> 
                            </div>
                            <div>
                                <span>Catégorie*         <label></label></span>
                                <input name="categorie" type="text"> 
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

        <div class="modal fade in" tabindex="1" role="dialog" id="uploadimage">        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data" method="POST" action="../ajax/addPicture.php">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">⚠ UPLOAD IMAGE ⚠</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />                            
                            <input name="file" type="file" />

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
