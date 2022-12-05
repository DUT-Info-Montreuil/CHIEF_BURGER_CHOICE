<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
    
    require_once('vue_generique.php');


    class VueBurger extends VueGenerique{
        
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
                                <label for="">'.htmlspecialchars($row['nom'], ENT_NOQUOTES).'</label>
                                <input type="checkbox" name='.htmlspecialchars($row['id_ingredient'], ENT_COMPAT).'>
                            </div>
                            <div class="form-creer-burger">
                                <h4><span class="theme_color">'.htmlspecialchars($row['prix'], ENT_NOQUOTES).'€</span></h4>
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