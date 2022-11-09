<?php
include_once "Connexion.php";

class ModelePlat extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function inserer_plat() {
            
		$sql = 'SELECT * FROM Menu';	
		$num = 0;
		foreach (self::$bdd ->query($sql) as $row) {
			$num++;
		}	  
		
        $id_menu = $num+1;
		$nomMenu = $_POST['burger'];
		$burger = $_POST['burger'];
		$boisson = $_POST['boisson'];

		$sth = self::$bdd->prepare('insert into Menu (id_menu,nom_menu,burger,boisson) values (?,?,?,?)');
		$sth->execute(array($id_menu,$nomMenu,$burger,$boisson));
        print "Menu commandé";
    }   
}
?>
