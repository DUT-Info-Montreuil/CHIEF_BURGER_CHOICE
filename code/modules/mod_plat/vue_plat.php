<?php

include_once "vue_generique.php";

class VuePlat extends VueGenerique1{
	
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
						echo '
						<label for="">'.$row['nom'].'</label>
						<input type="checkbox" name='.$row['nom'].'>
						';
					}
					echo'<button type="submit" class="btn btn-primary" name="appliquer_filtre">Appliquez vos filtres</button>
				
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
												<a href="index.php?module=mod_plat&action=pageCommande&idPlat='.$row['id_burger'].'  "><img src='.$row['image'].' alt="#" /></a>
											</div>
											<div class="product_blog_cont">
												<h3>'.$row['nom'].'</h3>
												<h4>'.$row['prix'].'<span class="theme_color">€</span></h4>
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
									echo'
										<div class="item">
											<div class="product_blog_img">
												<img src='.$row['image'].' alt="#" />
											</div>
											<div class="product_blog_cont">
												<h3>'.$row['nom'].'</h3>
												<h4>'.$row['prix'].'<span class="theme_color">€</span></h4>
											</div>
										</div>';
								}		
							echo '</div>
						</div>
					</div>
				</div>
			</section>';
	}
}

?>