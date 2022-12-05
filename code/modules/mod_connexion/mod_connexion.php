<?php
include_once "cont_connexion.php";
class ModConnexion {
	
	private $action;
	public $controleur;

	public function __construct() {
		$this->controleur = new ContConnexion();	
		$this->action = isset($_GET['action']) ? $_GET['action'] : "connecter";
	}

	public function exec() {
		switch ($this->action) {
			case "inscription":
                $this->controleur->form_inscription();
				break;
			case "sinscrire":
		  		$this->controleur->inscription();
				break;
            case "connecter":
                $this->controleur->form_connexion();
				break;
			case "connexion":				
		  		$this->controleur->connexion();					
				break;
			case "deconnecter":
				$this->controleur->form_deconnexion();
				break;
			case "deconnexion":
				$this->controleur->deconnexion();
				break;	
		}
		$tamp = $this->controleur->getVue()->getAffichage();	
		$this->controleur->getVue()->setTampon($tamp);		
	}	
}

?>
