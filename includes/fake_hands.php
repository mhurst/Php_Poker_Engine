<?php

class Fake_hands{
	public static function three_of_a_kind_five() {
		$returned = array(
		    array(
		        'face'  => '5',
		        'suit'  => 's',
		        'value' => '5',
		        'image' => 'images/cards/s5.gif'
		    ),
		    array(
		        'face'  => '5',
		        'suit'  => 'h',
		        'value' => '5',
		        'image' => 'images/cards/h5.gif'
		    ),
		    array(
		        'face'  => '5',
		        'suit'  => 'd',
		        'value' => '5',
		        'image' => 'images/cards/d5.gif'
		    ),
		    array(
		        'face'  => '6',
		        'suit'  => 's',
		        'value' => '6',
		        'image' => 'images/cards/s6.gif'
		    ),
		    array(
		        'face'  => '8',
		        'suit'  => 'h',
		        'value' => '8',
		        'image' => 'images/cards/h8.gif'
		    )
		);

		return $returned;
	}
}