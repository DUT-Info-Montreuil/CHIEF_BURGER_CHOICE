<?php

include_once "vue_generique.php";

class VuePlat extends VueGenerique1{
	
	public function __construct() {
		parent::__construct();
	}

    public function choix_plat() {
        echo '<div class="formPlat">
			<p>Plaaaaaaaaaaaaaaaaaaaaaaaaaaaaat</p>
				
			<form action= "index.php?module=mod_plat&action=inserer_plat" method="POST">

				<select name="burger">
					<option value="">--Choisissez un Burger-- </option>
					<option value="burger1">burger1</option>
					<option value="burger2">burger2</option>
					<option value="burger3">burger3</option>
				</select></br>

				<select name="boisson">
					<option value="">--Choisissez une Boisson--</option>
					<option value="Fanta">Fanta</option>
					<option value="Coca">Coca</option>
					<option value="iceTea>">iceTea</option>
				</select></br>

				<input type="submit" name="inserer"/>
			</form>
		</div>';
    }

	public function afficher_menus($ligne) {
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
					<fieldset>
						<legend>Veuillez sélectionner vos intérêts :</legend>
						<div>
						<input type="checkbox" id="coding" name="interest" value="coding">
						<label for="coding">Développement</label>
						</div>
						<div>
						<input type="checkbox" id="music" name="interest" value="music">
						<label for="music">Musique</label>
						</div>
					</fieldset>
			 	</div>

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme">';
								foreach ($ligne as $row) {
									echo'
										<div class="item">
											<div class="product_blog_img">
												<a href="index.php?module=mod_plat&action=affichePlat&idPlat='.$row['id_burger'].'  "><img src='.$row['image'].' alt="#" /></a>
											</div>
											<div class="product_blog_cont">
												<h3>'.$row['nom'].'</h3>
												<h4><span class="theme_color">$</span>'.$row['prix'].'</h4>
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
												<h4><span class="theme_color">$</span>'.$row['prix'].'</h4>
											</div>
										</div>';
								}		
							echo '</div>
						</div>
					</div>
				</div>
			</section>
		';
	}

	public function afm2() {

	}
	
}

?>

