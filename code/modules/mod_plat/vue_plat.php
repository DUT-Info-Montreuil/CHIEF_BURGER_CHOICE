<?php

include_once "vue_generique.php";

class VuePlat extends VueGenerique1{
	
	public function __construct() {
		parent::__construct();
	}

    public function choix_plat() {

        echo '<div class="formPlat">
			<p>Plaaaaaaaaaaaaaaaaaaaaaaaaaaaaat</p>
				
			<form action= "index.php?module=mod_plat&action=inserer_plat" method="POST">

				<select name="burger">
					<option value="">--Choisissez un Burger-- </option>
					<option value="burger1">burger1</option>
					<option value="burger2">burger2</option>
					<option value="burger3">burger3</option>
				</select></br>

				<select name="boisson">
					<option value="">--Choisissez une Boisson--</option>
					<option value="Fanta">Fanta</option>
					<option value="Coca">Coca</option>
					<option value="iceTea>">iceTea</option>
				</select></br>

				<input type="submit" name="inserer"/>
			</form>
		</div>';
    }

	public function afficher_menus($ligne) {
		echo '<div class="formPlat">
		<p>Tous les plats</p>';

		foreach ($ligne as $row) {
			
			echo $row['nom'];
			echo '<img src=';
			echo $row['image'];echo'alt="#">';	
		}

		echo'</div>';

	}
}

?>

