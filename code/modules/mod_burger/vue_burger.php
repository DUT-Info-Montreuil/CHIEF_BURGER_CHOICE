<?php
    
    require_once('vue_generique.php');


    class VueBurger extends VueGenerique1{
        
        public function __construct() {
            parent::__construct();
        }
    

        public function form_ajout($liste_ingredients) {
            echo '
            <div class="blog">
                <div class="imageBurger">
                <img src="images/burger21.jpg" alt="logo" />
                </div>
                
                <div  class="selectionIngredients">
                    <p>Merci de choisir vos ingredients:</p><br><br>
                    
                    <form action="index.php?module=mod_burger&action=addIngredient" method="POST">
                    <div class="form-group">		
						<input type="text" class="form-control" placeholder="Nom du burger" name= "nomBurger">
					</div>';
                    foreach($liste_ingredients as $row) {
                        echo'
                        <div class="form-creer">
                            <div class="form-creer-burger">
                                <label for="">'.$row['nom'].'</label>
                                <input type="checkbox" name='.$row['id_ingredient'].'>
                            </div>
                            <div class="form-creer-burger">
                                <h4><span class="theme_color">'.$row['prix'].'€</span></h4>
                            </div>
                        </div>
                        ';
                    }
                    if(isset($_SESSION['log'])) {
                        echo'<button type="submit" class="btn btn-primary" name="Valider">Créer votre burger</button>';
                    } else {
                        echo'<p id="lien-connexion-burger"><a href="index.php?module=mod_connexion&action=connecter">Connectez-vous pour créer un burger</a></p></br>';
                    }
                    echo'
                    </form>
                </div>        
            </div>
            ';
        }
    }
?>