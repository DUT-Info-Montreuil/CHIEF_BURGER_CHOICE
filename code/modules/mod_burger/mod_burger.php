<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
    require_once('cont_burger.php');

    class ModBurger {

        public $controleur;
        private $action;

        public function __construct() {
            $this->controleur = new ContBurger();
            $this->action = isset($_GET['action']) ? $_GET['action'] : " ";

        }

        public function exec() {     
            switch($this->action) {
                case "creer_burger" : $this->controleur->form_ajout(); break;
                case "addIngredient" : $this->controleur->ajout(); break;
            }
            $tamp = $this->controleur->getVue()->getAffichage();	
		    $this->controleur->getVue()->setTampon($tamp);
        }
    }
?>