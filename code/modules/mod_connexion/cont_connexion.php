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


    public function form_inscription() {
        $this->vue->form_inscription();
    }

	public function inscription() {
        
		
		
		
		
		
		
		/*if (isset($_POST['inscrire'])) {
			if ($_POST['login'] != null && $_POST['password'] != null && $_POST['mail'] != null && $_POST['confirmPassword'] != null) {
				if ($_POST['password'] == $_POST['confirmPassword']) {
					$this->modele->ajoutUtilisateur();
				} else {
					$this->vue->affichageErreur("Les mots de passe ne sont pas identiques");
				}
			}else {
				$this->vue->affichageErreur("Veuillez remplir tous les champs");
			}
		}*/
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