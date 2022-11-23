<?php
    
    require_once('vue_generique.php');


    class VueBurger extends VueGenerique1{
        
        public function __construct() {
            parent::__construct();
        }
    

        public function form_ajout() {
            echo '<div  class="selectionIngredients">

            <FORM ACTION="index.php?module=mod_burger&action=addIngredient" METHOD="POST">
    
                <INPUT TYPE="TEXT" NAME="nom_de_mon_burger" value="Nom du burger"> <br><br>
                    
                    <p>Merci de choisir vos ingredients:</p><br><br>
    
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
    
                    <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
                    <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
                    <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
                    <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
                    <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>
                    
                    
    
    
                    <INPUT TYPE="SUBMIT" NAME="bouton" value="Valider"> 
                    </FORM>
                
            </div>';
        }
    }
    /*<input type="checkbox" name="ingredient" value="pain 1"> pain 1<br>
            <input type="checkbox" name="ingredient" value="pain 2"> pain 2<br>
            <input type="checkbox" name="ingredient" value="pain 3"> pain 3<br>
            <input type="checkbox" name="ingredient" value="pain 4"> pain 4<br>
            <input type="checkbox" name="ingredient" value="pain 5"> pain 5<br>*/
?>