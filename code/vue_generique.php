<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
class VueGenerique{

    protected $tampon;

    public function __construct() {
        ob_start();
    }

    public function getAffichage() {
        return ob_get_clean(); 
    }

    public function setTampon($tamp) {
		$this->tampon = $tamp;
	}

	public function getTampon() {
		return $this->tampon;
	}
}
?>
