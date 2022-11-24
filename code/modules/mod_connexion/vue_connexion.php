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
			

			echo '<div class="formInscription">
				<p>Vous êtes déjà connecté sous : </p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
			</div>';
		}
		else {

        echo'<div class="formInscription">
				<form action= "index.php?module=mod_connexion&action=sinscrire" method="POST">
		
					<input type= "text" placeholder="Entrez un nom d\'utilisateur" name= "login"></br>
					</br>
					<input type= "text" placeholder="Entrez une adresse mail" name= "mail"></br>
					</br>
					<input type= "password" placeholder="Entrez un nouveau mot de passe" name= "password"></br>
					</br>
					<input type= "password" placeholder="Confirmation du mot de passe" name= "confirmPassword"></br>
					</br>
					<input type="submit" name="inscrire" />
				</form>
		</div>';
		}
    }

    public function form_connexion() {

		if(isset($_SESSION['log'])) {
			echo "Vous êtes déjà connecté sous : " . $_SESSION['log'];
			

			echo '<div class="formConnexion">
				<p>Vous êtes déjà connecté</p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
			</div>';
		}
		else {
        print "connectez-vous";
			
			echo'<div class="formConnexion">
					<form action= "index.php?module=mod_connexion&action=connexion" method="POST">
							<p>Connectez-vous</p>
							</br>
							<input type= "text" placeholder="nom d\'utilisateur" name= "login"></br>
							</br>
							<input type= "password" placeholder="mot de passe"name= "password"></br>
							</br>
							<input type="submit" name="seConnecter" /> 
					</form>
			</div>';
		}
    }

	public function form_deconnexion() {
		print "deconnectez-vous";
		echo'<div class="formConnexion">		
			<form action= "index.php?module=mod_connexion&action=deconnexion" method="POST">
				<input type="submit" name="seDeconnecter" />
			</form>
		</div>';
	}
}

?>
