<?php

include_once "/home/etudiants/info/bseydi/local_html/MVC3/vue_generique.php";


class VueConnexion extends VueGenerique{
	
	public function __construct() {
		parent::__construct();
	}

	public function affiche_liste($tab) {
		if (is_array($tab) || is_object($tab)) {
			foreach ($tab as $value) {
				foreach ($value as $valuer) {
					print $valuer."\n";
				}
			}
		}		
	}	

	public function menu() {		
			$url1 = "index.php?module=mod_connexion&action=inscription";
			$url2 = "index.php?module=mod_connexion&action=connecter";			
			echo '<a href="'.$url1.'">'."inscription ".'</a>'.'<br>';
			echo '<a href="'.$url2.'">'."connexion ".'</a>'.'<br>';	
			echo '<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>';
	}

    public function form_inscription() {
		if(isset($_SESSION['log'])) {
			echo "Vous êtes déjà connecté sous : " . $_SESSION['log'];
			echo '<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>';
		}
		else {
        print "inscrivez-vous";
        echo'<form action= "index.php?module=mod_connexion&action=sinscrire" method="POST">
            <input type= "text" name= "login">
			<input type= "password" name= "password">
			
			<input type="submit" name="inscrire" /> 
		</form>';
		}
    }

    public function form_connexion() {

		if(isset($_SESSION['log'])) {
			echo "Vous êtes déjà connecté sous : " . $_SESSION['log'];
			echo '<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>';
		}
		else {
        print "connectez-vous";
        echo'<form action= "index.php?module=mod_connexion&action=connexion" method="POST">
            <input type= "text" name= "login">
			<input type= "password" name= "password">
			
			<input type="submit" name="seConnecter" /> 
		</form>';
		}
    }

	public function form_deconnexion() {
		print "deconnectez-vous";
		echo'<form action= "index.php?module=mod_connexion&action=deconnexion" method="POST">
			<input type="submit" name="seDeconnecter" />
		</form>';
	}
}

?>