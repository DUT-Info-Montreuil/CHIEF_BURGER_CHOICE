<?php
include_once "vue_connexion.php";
include_once "modele_connexion.php";

class ContConnexion {
	
	
	private $vue;
	private $modele;

	public function __construct() {
		$this->vue = new VueConnexion();
		$this->modele = new ModeleConnexion;
	}

	public function menu() {
		echo "menu ".'<br>';
		$this->vue->menu();
	}

    public function form_inscription() {
        $this->vue->form_inscription();
    }

	public function inscription() {
        if (isset($_POST['inscrire'])) {
			$this->modele->ajoutUtilisateur();
		}
	}

    public function form_connexion() {
        $this->vue->form_connexion();
    }

	public function connexion() {
        if (isset($_POST['seConnecter'])) {
			$this->modele->seConnecter();
		}
	}
    
	public function form_deconnexion() {
        $this->vue->form_deconnexion();
    }

	public function deconnexion() {	
		if (isset($_POST['seDeconnecter'])) {
			$this->modele->seDeconnecter();
		}

	}

	public function getVue() {
		return $this->vue;
	}	
}
?>