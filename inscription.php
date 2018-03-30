<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="box ">
            <div class="info">
                <div class="card">
                    <div class="account-in">
                        <div class="container">
                            <form method="POST" action="ajax/addAccount.php" data-toggle="validator"> 
                                <div class="register-top-grid grid_1">
                                    <h1>Inscription</h1>
                                    <div>
                                        <span>Nom<label>*</label></span>
                                        <input name="nom" type="text" required> 
                                    </div>
                                    <div>
                                        <span>Mot de passe<label>*</label></span>
                                        <input name="pass" type="password" required> 
                                    </div>
                                    <div>
                                        <span>Confirmation<label>*</label></span>
                                        <input name="confirm" type="password" required> 
                                    </div>
                                    <div>
                                        <span>Adresse<label>*</label></span>
                                        <input name="adresse" type="text" required> 
                                    </div>
                                    <div>
                                        <span>Tel<label>*</label></span>
                                        <input name="tel" type="tel" required> 
                                    </div>
                                    <div>
                                        <span>Email<label>*</label></span>
                                        <input name="email" type="email" required> 
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>

                                <div class="clearfix"> </div>
                                <div class="register-but">                                                          
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                    <div class="clearfix"> </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        </body>
        <div class="copy">
            <p> &copy; 2018 LAFLEUR. All Rights Reserved | Design by NEJE</p>
        </div>
        </html>		