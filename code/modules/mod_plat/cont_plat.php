<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/

include_once "vue_plat.php";
include_once "modele_plat.php";

class ContPlat{
		
	private $vue;
	private $modele;

	public function __construct() {
		$this->vue = new VuePlat();
		$this->modele = new ModelePlat;
	}

	public function inserer_plat() {
        if (isset($_POST['inserer'])) {
			$this->modele->inserer_plat();
		}
	}

	public function afficher_menus() {
		$liste = $this->modele->liste_plat();
		$filtre = $this->modele->liste_categorie();
		$this->vue->afficher_menus($liste,$filtre);
	}

	public function getVue() {
		return $this->vue;
	}	
}

?>