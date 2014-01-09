<!html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="main">
		<div class="player1">
			<?php
			error_reporting(E_ALL ^ E_NOTICE);
				include("includes/deal.php");
				$deal = new Deal();
				$deal->build_new_deck();
				$new_deck = $deal->returned_array;
				include("includes/hand_eval.php");
				$eval = new Hand_eval();

				include("includes/utils.php");
				
				$eval->hand = $new_deck['player1'];
				$comment = $eval->evaluate_hand();
			?>
			<ul>
			<?php foreach($new_deck['player1'] as $player1) { ?>
				<li style="color: #fff;"><img src="<?php echo $player1['image'];?>"><?php echo $player1['value'];?></li>
			<?php } ?>
			</ul>
			<div style="color:#fff;"><?= $comment; ?></div>
		</div>
	</div>
</body>
</html>