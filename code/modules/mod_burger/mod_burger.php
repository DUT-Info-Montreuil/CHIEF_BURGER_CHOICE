<?php
    require_once('cont_burger.php');

    class ModBurger {

        private $controleur;
        private $module;

        public function __construct() {
            $this->controleur = new ContBurger();
            $this->module = isset($_GET['module']) ? $_GET['module'] : " ";
            $this->controleur->exec();
        }

        /*public function exec() {
            switch($this->action) {
                 
                case 'ingredient': $this->controleur->ajout(); break;
            }
        }*/

    }
?>