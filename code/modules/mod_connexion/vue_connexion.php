<?php

include_once "vue_generique.php";


class VueConnexion extends VueGenerique1{
	
	public function __construct() {
		parent::__construct();
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

			echo '<div class="formDejaIns">

				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>
			</div>';
		}
		else {

        echo'<div class="formInscription">
				<form action= "index.php?module=mod_connexion&action=sinscrire" method="POST">
					<p>Entrez un nom d utilisateur</p>
					<input type= "text" name= "login"></br>

					<p>Entrez une adresse mail</p>
					<input type= "text" name= "mail"></br>

					<p>Entrez un nouveau mot de passe</p>
					<input type= "password" name= "password"></br>

					<p>Confirmez votre nouveau mot de passe</p>
					<input type= "password" name= "confirmPassword"></br>
					
					<input type="submit" name="inscrire" />
				</form>
		</div>';
		}
    }

    public function form_connexion() {

		if(isset($_SESSION['log'])) {
			echo "Vous êtes déjà connecté sous : " . $_SESSION['log'];
			echo '<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>';

			echo '<div class="formDejaCo">

				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p>
			</div>';
		}
		else {
        print "connectez-vous";

        echo'<div class="formConnexion">
				<form action= "index.php?module=mod_connexion&action=connexion" method="POST">
						<p>Entrez votre nom d`utilisateur</p>
						<input type= "text" name= "login"></br>

						<p>Entrez votre mot de passe</p>
						<input type= "password" name= "password"></br>
					
					<input type="submit" name="seConnecter" /> 
				</form>
		</div>';
		}
    }

	public function form_deconnexion() {
		print "deconnectez-vous";
		echo'<div class="formDeconnexion">		
			<form action= "index.php?module=mod_connexion&action=deconnexion" method="POST">
				<input type="submit" name="seDeconnecter" />
			</form>
		</div>';
	}
}

?>
