<?php

include_once "vue_plat.php";
include_once "modele_plat.php";

class ContPlat{
		
	private $vue;
	private $modele;

	public function __construct() {
		$this->vue = new VuePlat();
		$this->modele = new ModelePlat;
	}

    public function choix_plat() {
        $this->vue->choix_plat();
    }

	public function inserer_plat() {
        if (isset($_POST['inserer'])) {
			$this->modele->inserer_plat();
		}
	}

	public function afficher_menus() {
		$row = $this->modele->liste_plat();
		$this->vue->afficher_menus($row);
	}

	public function afficher_burger() {
		$row = $this->modele->liste_plat();
		$row2 = $this->modele->liste_ingredients_d_un_burger($_GET['idPlat']);
		$this->vue->afficher_page_burger($row,$row2);
	}


	


	public function getVue() {
		return $this->vue;
	}



	
	public function commande_plat() {
		if (isset($_POST['commande'])) {
			$this->modele->inserer_plat();
		}
	}
	
}

?>