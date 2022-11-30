<?php
    require_once('cont_burger.php');

    class ModBurger {

        public $controleur;
        private $action;

        public function __construct() {
            $this->controleur = new ContBurger();
            $this->action = isset($_GET['action']) ? $_GET['action'] : " ";

        }

        public function exec() {
            echo('rentre ds exec de mod_burger');
            echo $this->action;
            switch($this->action) {
                case "creer_burger" : $this->controleur->form_ajout(); break;
                case "addIngredient" : $this->controleur->ajout(); break;
            }
            $tamp = $this->controleur->getVue()->getAffichage();	
		    $this->controleur->getVue()->setTampon($tamp);
        }

    }
?>