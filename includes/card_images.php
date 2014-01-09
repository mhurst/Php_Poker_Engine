<?php 

include "deck.php";

class Card_images {
	public $returned_array = array();

	public function __contstruct() {

		$start = 2;
		$deck = new Deck();
		$suits = $deck->deck_suits;

		foreach($suits as $suit) {
			for($x = 14; $x >= $start; $x--) {
				$this->returned_array[$suit.$x] = "../cards/images/".$suit.$x.".gif";
			}
		}
	}
}