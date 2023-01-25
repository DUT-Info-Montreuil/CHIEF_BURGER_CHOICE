<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
include_once "vue_generique.php";

class VuePlat extends VueGenerique{
	
	public function __construct() {
		parent::__construct();
	}

	public function afficher_menus($ligne, $filtre) {
		echo '
			<div class="yellow_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="title">
								<h2>Nos recettes</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- section -->
			<section class="resip_section">
				<div class="select-filtre">
					<form action="index.php?module=mod_plat&action=afficher_menus" method="POST">';
					foreach($filtre as $row) {
						$nom = $row['nom'];
						echo '
						<div class="visu-filtre">
							<label for="">'.htmlspecialchars($nom,ENT_NOQUOTES).'</label>
							<input type="checkbox" name='.htmlspecialchars($nom,ENT_COMPAT).'>
						</div>
						';
					}

					echo'
					</br>
					</br>
					<button type="submit" class="btn btn-primary" name="appliquer_filtre">Appliquez vos filtres</button>
				
					</form>
			 	</div>';
				
				if(empty($ligne)) {
					echo'
					<div class="filtre-vide">
						<p>Aucun burger ne correspond à vos filtres</p>
						<button><a href="index.php?module=mod_plat&action=afficher_menus">Retourner aux menus</a></button>
					</div>
					';
				}
				echo'
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme">';
								foreach ($ligne as $row) {
									echo'
										<div class="item">
											<div class="product_blog_img">
												<a href="index.php?module=mod_plat&action=pageCommande&idPlat='.htmlspecialchars($row['id_burger'],ENT_COMPAT).'  "><img src='.htmlspecialchars($row['image'],ENT_COMPAT).' alt="#" /></a>
											</div>
											<div class="product_blog_cont">
												<h3>'.htmlspecialchars($row['nom'],ENT_NOQUOTES).'</h3>
												<h4>'.htmlspecialchars($row['prix'],ENT_NOQUOTES).'<span class="theme_color">€</span></h4>
											</div>
										</div>';
								}		
							echo '</div>
						</div>
					</div>
				</div>


			</section>

			


			<div class="yellow_bg">
				<div class="container">
						<div class="row">
							<div class="col-md-12">
							<div class="title">
								<h2>Les recettes de nos clients</h2>
								
							</div>
							</div>
						</div>
					</div>
			</div>
			<!-- section -->
			<section class="resip_section">
				<div class="container">
					<div class="row">
						
						<div class="col-md-12">
							<div class="owl-carousel owl-theme">';
							foreach ($ligne as $row) {
								if($row['id_utilisateur'] != 2) {
									echo'
										<div class="item">
											<div class="product_blog_img">
												<a href="index.php?module=mod_plat&action=pageCommande&idPlat='.htmlspecialchars($row['id_burger'],ENT_COMPAT).'  "><img src='.htmlspecialchars($row['image'],ENT_COMPAT).' alt="#" /></a>
											</div>
											<div class="product_blog_cont">
												<h3>'.htmlspecialchars($row['nom'],ENT_NOQUOTES).'</h3>
												<h4>'.htmlspecialchars($row['prix'],ENT_NOQUOTES).'<span class="theme_color">€</span></h4>
											</div>
										</div>';
								}
							}			
							echo '</div>
						</div>
					</div>
				</div>
			</section>';
	}
}

?>