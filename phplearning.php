<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Перечисления: Enums</title>
</head>
<body>
<?php 
enum Suit {
	case Hearts;
	case Diamonds;
	case Clubs;
	case Spades;
}

function do_stuff(Suit $s) {

}

do_stuff(Suit::Spades);
 ?>


<!-- https://www.php.net/manual/ru/language.types.enumerations.php -->
</body>
</html>
