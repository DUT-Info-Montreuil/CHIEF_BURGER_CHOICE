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

		echo '<div class="formPlat">
		<p>Tous les plats</p>';

		
		echo'</div>';

	
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
				<div class="container">
					<div class="row">';
						echo '<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown button
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>';
					   
						echo'<div class="col-md-12">
					<div class="owl-carousel owl-theme">';
						foreach ($ligne as $row) {
							echo'
								<div class="item">
									<div class="product_blog_img">
										<a href="index.php?module=mod_plat&action=afficherPlat&idPlat='.$row['id_burger'].'  "><img src=';echo $row['image'];echo' alt="#" /></a>
									</div>
									<div class="product_blog_cont">
										<h3>';echo $row['nom'];echo'</h3>
										<h4><span class="theme_color">$</span>';echo $row['prix'];echo'</h4>
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
												<img src=';echo $row['image'];echo' alt="#" />
											</div>
											<div class="product_blog_cont">
												<h3>';echo $row['nom'];echo'</h3>
												<h4><span class="theme_color">$</span>';echo $row['prix'];echo'</h4>
											</div>
										</div>';
								}		
							echo '</div>
						</div>
					</div>
				</div>
			</section>
		
			';

			?>
			
		   <script type="text/javascript">
				$(document).ready(function() {
					$("#sidebar").mCustomScrollbar({
						theme: "minimal"
					});
		
					$('#dismiss, .overlay').on('click', function() {
						$('#sidebar').removeClass('active');
						$('.overlay').removeClass('active');
					});
		
					$('#sidebarCollapse').on('click', function() {
						$('#sidebar').addClass('active');
						$('.overlay').addClass('active');
						$('.collapse.in').toggleClass('in');
						$('a[aria-expanded=true]').attr('aria-expanded', 'false');
					});
				});
			</script>
			<?php
	}

	public function afficher_page_burger($ligne, $ligne_ingr){

		/*
		Aller chercher dans la BDD le burger ou ID=$_GET['id_Plat]
		
		afficher :
		-nom
		-prix
		-categorie
		-liste de ses infrgedients
		-bouton like
		-avis (commentaires)
		 
		
		
		*/

		foreach($ligne as $row){
			if($row['id_burger'] == $_GET['idPlat']){
			echo'<!-- about -->
			<div class="about">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<i><img src="images/title.png" alt="#"/></i>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
						<div class="about_box">
							<h3>'; echo $row['nom'] ; echo'</h3>
							<p>'; echo $row['prix'] ; echo'€</p></br>';
							foreach($ligne_ingr as $row2){
								
									echo '<p> ';echo $row2['nom'] ;'</p>';
								
							}
							echo'
							
						</div>
					</div>
					<div class="col-xl-5 col-lg-5 col-md-10 col-sm-12 about_img_boxpdnt">
						<div class="about_img">
							<figure><img src=';echo $row['image'];echo' alt="#" /></figure>
						</div>
					</div>      
				</div> 
				</div>
			</div>
			<!-- end about -->';
			}
		}
	}
}


?>
