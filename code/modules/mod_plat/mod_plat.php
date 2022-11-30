<<<<<<< HEAD
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
		}
		$tamp = $this->controleur->getVue()->getAffichage();	
		$this->controleur->getVue()->setTampon($tamp);		
	}
}

=======
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
		}
		$tamp = $this->controleur->getVue()->getAffichage();	
		$this->controleur->getVue()->setTampon($tamp);		
	}
}

>>>>>>> ffe43ba407183df3f98ba08e376f45bc4a685c35
?>