<?php

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
