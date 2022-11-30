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