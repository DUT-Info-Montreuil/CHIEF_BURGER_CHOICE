<?php
    
    class VueBurger {
    

        public function form_ajout() {
            echo '<FORM ACTION="index.php?module=mod_burger&action=addIngredient" METHOD="POST">
             
            Merci de choisir vos ingredients:<br><br>

            PAIN:<br><br>

            <br>

            <input type="checkbox" name="ingredient[]" value="salade"> salade<br>
            <input type="checkbox" name="ingredient[]" value="tomate"> tomate<br>
            <input type="checkbox" name="ingredient[]" value="oignion"> oignion<br>
            <input type="checkbox" name="ingredient[]" value="cornichons"> cornichons<br>
            <input type="checkbox" name="ingredient[]" value="piment"> piment<br><br>

            <INPUT TYPE="TEXT" NAME="nom_de_mon_burger" value="Nom du burger"> 


            <INPUT TYPE="SUBMIT" NAME="bouton" value="Valider"> 
            </FORM>';
        }
    }
    /*<input type="checkbox" name="ingredient" value="pain 1"> pain 1<br>
            <input type="checkbox" name="ingredient" value="pain 2"> pain 2<br>
            <input type="checkbox" name="ingredient" value="pain 3"> pain 3<br>
            <input type="checkbox" name="ingredient" value="pain 4"> pain 4<br>
            <input type="checkbox" name="ingredient" value="pain 5"> pain 5<br>*/
?>