<?php

include_once "/home/etudiants/info/bseydi/local_html/ChiefBurgerChoice/vue_generique.php";

class VuePlat extends VueGenerique1{
	
	public function __construct() {
		parent::__construct();
	}

    public function choix_plat() {

        echo'<form action= "index.php?module=mod_plat&action=inserer_plat" method="POST">
            <select name="burger" id="pet-select">
                <option value="">--Choisissez un Burger--</option>
                <option value="burger1">burger1</option>
                <option value="burger2">burger2</option>
                <option value="burger3">burger3</option>
            </select><br></br>

            <select name="boisson" id="pet-select">
            <option value="">--Choisissez une Boisson--</option>
            <option value="boisson1">boisson1</option>
            <option value="boisson2">boisson2</option>
            <option value="boisson3">boisson3</option>
        </select><br></br>

            <input type="submit" name="inserer" />
		</form>';
    }
}

?>