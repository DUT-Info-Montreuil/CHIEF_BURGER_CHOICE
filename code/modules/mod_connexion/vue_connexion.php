<?php

include_once "vue_generique.php";


class VueConnexion extends VueGenerique1{
	
	public function __construct() {
		parent::__construct();
	}

    public function form_inscription() {
		if(isset($_SESSION['log'])) {
			echo '<div class="formConnexion">
				<p>Vous êtes déjà connecté sous : ';echo $_SESSION['log'];echo'</p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
			</div>';
		}
		else {
			echo'<div class="formConnexion">
					<form action= "index.php?module=mod_connexion&action=sinscrire" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Identifiant</label>
							<input type="text" class="form-control" placeholder="Enter votre nom d\'utilisateur" name= "login">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Email</label>
							<input type="text" class="form-control" placeholder="Entrez votre email" name= "mail">
							<small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu\'un d\'autre.</small>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Mot de passe</label>
							<input type="password" class="form-control" placeholder="Entrez votre mot de passe" name= "password">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Confirmation mot de passe</label>
							<input type="password" class="form-control" placeholder="Confirmez votre mot de passe" name= "confirmPassword">
						</div>

						<button type="submit" class="btn btn-primary" name="inscrire">Envoyer</button>
					</form>
				</div>';
		}
    }

    public function form_connexion() {
		if(isset($_SESSION['log'])) {
			echo '<div class="formConnexion">
				<p>Vous êtes déjà connecté sous : ';echo $_SESSION['log'];echo'</p></br>
				</br>
				<p><a href="index.php?module=mod_connexion&action=deconnecter">Se déconnecter</a></p></br>
			</div>';
		}
		else {	
			echo'<div class="formConnexion">
					<form action= "index.php?module=mod_connexion&action=connexion" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Identifiant</label>
							<input type="text" class="form-control" placeholder="Enter votre nom d\'utilisateur" name= "login">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mot de passe</label>
							<input type="password" class="form-control" placeholder="Entrez votre mot de passe" name= "password">
						</div>
						<button type="submit" class="btn btn-primary" name="seConnecter">Envoyer</button>
					</form>
				</div>';
		}
    }

	public function form_deconnexion() {
		print "deconnectez-vous";
		echo'<div class="formConnexion">		
			<form action= "index.php?module=mod_connexion&action=deconnexion" method="POST">
				<button type="submit" class="btn btn-primary" name="seDeconnecter">Déconnecter</button>
			</form>
			<button type="submit" class="btn btn-primary" name="seDeconnecter">NON</button>
		</div>';
	}
}

?>
