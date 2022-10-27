<?php

include_once "/home/etudiants/info/bseydi/local_html/ChiefBurgerChoice/vue_generique.php";

class VueMenu extends VueGenerique1 {

	public $contenu;

	public function __construct () {	
		parent::__construct();

			$this->contenu = '<nav><a href="index.php?module=mod_plat">Choix des menus</a> - ';
			if(!isset($_SESSION['login'])){
					
				$this->contenu .= "<a href=index.php?module=mod_connexion&action=connecter>Connexion</a> - <a href=index.php?module=mod_connexion&action=inscription>Inscription</a></nav>";
					
			} else{
				$this->contenu .= " <a href=index.php?module=mod_connexion&action=deconnecter>Se déconnecter</a></nav>";					
			}
	}

}
?>
