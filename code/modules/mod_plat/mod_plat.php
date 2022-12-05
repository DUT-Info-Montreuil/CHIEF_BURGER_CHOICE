<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/

include_once "cont_plat.php";

class ModPlat {

    private $action;
	public $controleur;

    public function __construct() {
		$this->controleur = new ContPlat();	
		$this->action = isset($_GET['action']) ? $_GET['action'] : "afficher_menus";
	}

    public function exec() {
		switch ($this->action) {
			case "afficher_menus":
				$this->controleur->afficher_menus();
				break;
			case "inserer_plat":
		  		$this->controleur->inserer_plat();
				break;
			case "commande_plat":
				$this->controleur->commande_plat();
				break;
		}
		$tamp = $this->controleur->getVue()->getAffichage();	
		$this->controleur->getVue()->setTampon($tamp);		
	}
	
}
?>