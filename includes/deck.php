<?php

include("cards.php");

class Deck extends Cards{

	private $shuffle = true;


	public function __construct() {
		parent::__construct();
		// echo "<pre>"; print_r($this->deck_images); echo "</pre>";
	}

	public function return_deck() {
		$this->set_deck();
		return $this->deck_full;
	}

	public function shuffle_deck() {
		shuffle($this->deck_full);
	}

	public function reset_deck() {
		$this->set_deck();
	}

	private function set_deck() {

		foreach($this->deck_suits as $deck_suit) {

			$i = 0;

			foreach ($this->deck_values as $deck_value) {
				$this->deck_full[] = array(
					'suit'  => $deck_suit,
					'value' => $deck_value,
					'face'  => $this->deck_faces[$i],
					'image' => $this->deck_images[$deck_suit.$deck_value]
				);

				$i++;
			}
		}

		if($this->shuffle) {
			$this->shuffle_deck();
		}
	}
}