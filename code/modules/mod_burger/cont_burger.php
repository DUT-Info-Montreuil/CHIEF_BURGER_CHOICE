<?php
    require_once('modele_burger.php');
    require_once('modele_burger.php');
    
    class ContBurger {
        private $modele;
        private $vue;
        private $action;

        public function __construct() {
            $this->modele = new ModeleBurger();
            $this->vue = new VueBurger();
            $this->action = isset($_GET['action']) ? $_GET['action'] : " ";
        }

        
        public function form_ajout() {
            $this->vue->form_ajout();
        }

        public function ajout() {
            $this->modele->creerBurger();

        }

        public function exec() {
            
            switch($this->action) {
                case "creer_burger" : $this->form_ajout(); break;
                case "addIngredient" : $this->ajout(); break;
            }
        }


    }
?>