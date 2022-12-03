<?php

include_once "cont_plat.php";

class ModPlat {

    private $action;
	public $controleur;

    public function __construct() {
		$this->controleur = new ContPlat();	
		$this->action = isset($_GET['action']) ? $_GET['action'] : "choix_plat";
	}

    public function exec() {
		switch ($this->action) {
			case "choix_plat":
                $this->controleur->choix_plat();
				break;
			case "inserer_plat":
		  		$this->controleur->inserer_plat();
				break;
			case "afficher_menus":
				$this->controleur->afficher_menus();
				break;

			case "commande_plat":
				$this->controleur->commande_plat();
				break;
				
			case "afficherPlat":
				$this->controleur->affiche_page_burger();
				break;
		}
		$tamp = $this->controleur->getVue()->getAffichage();	
		$this->controleur->getVue()->setTampon($tamp);		
	}
	
}

?>