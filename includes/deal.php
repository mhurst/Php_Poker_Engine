<?php

include("deck.php");

class Deal {
	public  $deck;
	public  $num_of_players; //need to be refactored to another class for games.
	public  $cards_per_player; //need to be refactored to another class for games.
	public  $num_of_cards = 52; //to be used in the future.
	public  $returned_array = array();
	private $full_deck = array();

	function __construct($num_of_players = 4, $cards_per_player = 5) {
		$this->deck = new Deck();
		$this->cards_per_player = $cards_per_player;
		$this->num_of_players   = $num_of_players;

		$this->full_deck = $this->deck->return_deck();
	}

	function build_new_deck($fake = false) {

		if($fake) {
			include("fake_hands.php");
			$this->returned_array = Fake_hands::three_of_a_kind_five();
			return;
		}

		for($x = $this->num_of_players; $x>=1; $x--) {
			$this->returned_array['player'.$x] = array();
		}

		foreach($this->returned_array as $key => $players) {
			for($i = $this->cards_per_player; $i>=1; $i--) {
				$card = array_shift($this->full_deck);
				$this->returned_array[$key][] = array(
					'suit'  => $card['suit'],
					'value' => $card['value'],
					'face'  => $card['face'],
					'image' => $card['image']
				);
			}
		}
	}
}