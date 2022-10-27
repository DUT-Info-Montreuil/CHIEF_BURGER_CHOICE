<?php
include_once "cont_menu.php";

class compMenu{

		private $controleur;

		public function __construct () {		
			$this->controleur = new ContMenu();
		}

		public function affiche() {
			echo $this->controleur->getVue()->contenu;
		}
	}
?>
