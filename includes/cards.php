<?php

class Cards {

	protected $deck_suits  = array('h', 'd', 'c', 's');
	Protected $deck_values = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	Protected $deck_faces  = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
	protected $deck_images = array();

	protected function __construct() {
		$this->set_images();
	}

	protected function set_images() {
		$start = 2;

		foreach($this->deck_suits as $suit) {
			for($x = 14; $x >= $start; $x--) {
				$this->deck_images[$suit.$x] = "images/cards/".$suit.$x.".gif";
			}
		}
	}
}