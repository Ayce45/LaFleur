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
                                            <th>Image</th>
                                            <th style="width:9%" ></th>
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
                                            <td><a class="color7" target="_blank" href="../images/<?= $donnees["pdt_image"] ?>"><?= $donnees["pdt_image"] ?></a></td>
                                            <td> <button class="btn btn-danger btn-sm"  onclick="window.location.href = 'deleteProduct.php?id=<?= $donnees["pdt_ref"] ?>'" data-toggle="modal"><i class="fa fa-trash-o"></i></button>	 
                                                <button class="btn btn-info btn-sm" data-target="#modifyProduct<?= $donnees["pdt_ref"] ?>" data-toggle="modal" ><i class="fa fa-edit"></i></button>	  </td>
                                        </tr>


                                        <div class="modal fade in" tabindex="1" role="dialog" id="modifyProduct<?= $donnees["pdt_ref"] ?>">        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="../ajax/modifyProduct.php">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center">⚠ Modification du produit ⚠</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <span>Désignation*     <label></label></span>
                                                                <input name="ref" type="hidden" value="<?= $donnees["pdt_ref"] ?>" >
                                                                <input name="name" type="text" value="<?= $donnees["pdt_designation"] ?>"> 
                                                            </div>
                                                            <div>
                                                                <span>Prix *      <label></label></span>                                                              
                                                                <input name="price" type="float" value="<?= $donnees["pdt_prix"] ?>" >
                                                            </div>
                                                            <div>
                                                                <span>Catégorie*    </span>
                                <!--                                <input name="categorie" type="text"> -->
                                                                <select name="categorie" >
																<?php                                                                     
                                                                    $reponse1 = $bdd->query("SELECT * FROM categorie");
                                                                    while ($donnees1 = $reponse1->fetch()) {
                                                                        
																		If($donnees1["cat_code"] == $donnees["pdt_categorie"]){
																			echo'<option value="'.$donnees1["cat_code"].'" selected>'.$donnees1["cat_libelle"].'</option>';
																		}
																		else{
                                                                         echo'<option value="'.$donnees1["cat_code"].'" >'.$donnees1["cat_libelle"].'</option>';
																		}
																		 
                                                                     } ?>
																	
                                                                </select>

                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" onclick="window.location.href = '../ajax/modifyProduct.php?id=<?= $donnees["pdt_ref"] ?>'" class="btn btn-primary">Valider</button>                    
                                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Annuler</button>
                                                        </div>
                                                    </form>

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
        <div class="modal fade in" tabindex="1" role="dialog" id="createproduct">        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data" action="../ajax/addProductAdmin.php" data-toggle="validator">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">⚠ CREATION PRODUIT ⚠</h5>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span>Référence*    </span>
                                <input name="ref" type="text" required> 
                            </div>
                            <div>
                                <span>Désignation*</span>
                                <input name="desi" type="text" required> 
                            </div>
                            <div>
                                <span>Prix*             </span>
                                <input name="prix" type="text" required> 
                            </div>
                            <div>
                                <span>Image*         </span>                     
                                <input name="file" type="file" style="display: initial;" required>                                                 
                            </div>
                            <div>
                                <span>Catégorie*    </span>
<!--                                <input name="categorie" type="text"> -->
                                <select name="categorie">
                                    <?php
                                    $reponse = $bdd->query("SELECT * FROM categorie");
                                    while ($donnees = $reponse->fetch()) {
                                        ?>
										
                                        <option value="<?= $donnees["cat_code"] ?>"><?= $donnees["cat_libelle"] ?></option>
                                    <?php } ?>
                                </select>

                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>                    
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Annuler</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>    



</body>

</html>