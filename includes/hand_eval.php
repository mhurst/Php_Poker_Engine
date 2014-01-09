<?php

class Hand_eval{

	public $hand;

	// temp array to work with
	// public $hand = array(
	//     array(
	//         'face'  => '5',
	//         'suit'  => 's',
	//         'value' => '5'
	//     ),
	//     array(
	//         'face'  => '5',
	//         'suit'  => 'h',
	//         'value' => '5'
	//     ),
	//     array(
	//         'face'  => '6',
	//         'suit'  => 'h',
	//         'value' => '6'
	//     ),
	//     array(
	//         'face'  => '6',
	//         'suit'  => 's',
	//         'value' => '6'
	//     ),
	//     array(
	//         'face'  => '8',
	//         'suit'  => 'h',
	//         'value' => '8'
	//     )
	// );

	public $match_card_face  = array();
	public $match_card_suits = array();


	public function evaluate_hand() {
		if ($this->has_flush($this->match_card_suits)) {
		    return "You have a flush";
		} else if ($this->has_consec($this->hand)) {
		    return "You have a straight";
		} else if ($fourof_kind = $this->has_four_of_kind($this->match_card_face)) {
		    return "You have four " . $fourof_kind ."'s";
		} else if($threeof_kind = $this->has_three_of_kind($this->match_card_face)) {
		    return "You have three " . $threeof_kind ."'s";
		// } else if($my = $this->has_two_pair()) {
		// 	return "You have two pair ". $my[1] ."'s and ". $my[0]. "'s ";
		} else if($pair = $this->has_pair($this->match_card_face)) {
		    return "You have a pair of ". $pair ."'s";
		} else {
			return "You have a ". $this->high_card() ." high";
		}

	}

	function get_match_card_faces() {
		foreach($this->hand as $cards) {
		    $this->match_card_face[$cards['face']]++;
		}
	}

	private function get_match_card_suits() {
		foreach($hand as $cards) {
		    $this->match_card_suits[$cards['suit']]++;
		}
	}

	private function high_card() {
		$h_c_array = array();

		foreach($this->hand as $key => $value) {
			$h_c_array[$value['value']] = $value['face'];
		}

		ksort($h_c_array);

		return array_pop($h_c_array);
		
	}

	 function has_pair() {
		$this->get_match_card_faces();

   		return array_search(2, $this->match_card_face);
	}


	 function has_two_pair() {
		$this->get_match_card_faces();
	 	$pairs = array_keys($this->match_card_face, 2);
	 	sort($pairs);
	 	if(count($pairs) > 1) {
	 		return $pairs;
		} else {
			return false;
		}
	}

	private function has_three_of_kind() {
	    return array_search(3, $this->match_card_face);
	}

	private function has_four_of_kind() {
	    return array_search(4, $this->match_card_face);
	}

	private function has_consec() {
	    $d = $this->strip_to_face_value($this->hand);

	    for($i=0; $i<count($d); $i++) {
	        if(isset($d[$i+1]) && $d[$i]+1 != $d[$i+1]) {
	            return false;
	        }
	    }
	    return true;
	}

	private function has_flush() {
	    return array_search(5, $this->match_card_suits);
	}

	private function has_full_house() {

	}

	private function has_straight_flush() {

	}

	private function has_royal_flush() {

	}

	private function has_royal_straight_flush() {

	}

	private function strip_to_face_value($array) {
	    $results = array();
	    foreach($array as $faces) {
	        array_push($results, $faces['value']);
	    }
	    sort($results);
	    return $results;
	}
}

// $hand_eval = new Hand_eval();
// echo $hand_eval->has_pair($hand_eval->match_card_face);
// echo $hand_eval->evaluate_hand();

// $hand = $hand_eval->has_two_pair();
// include("utils.php");

// Utils::clean_dump($hand_eval->has_two_pair());