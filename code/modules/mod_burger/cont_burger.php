<?php
    require_once('modele_burger.php');
    require_once('vue_burger.php');
    
    
    class ContBurger {
        private $modele;
        private $vue;

        public function __construct() {
            $this->modele = new ModeleBurger();
            $this->vue = new VueBurger();
        }
    
        public function form_ajout() {
            $liste = $this->modele->liste_ingredients();
            $this->vue->form_ajout($liste);
        }

        public function ajout() {
            if (isset($_POST['Valider'])) {
                $this->modele->creerBurger(); 
            }
        }

        public function getVue() {
            return $this->vue;
        }

    }
?>