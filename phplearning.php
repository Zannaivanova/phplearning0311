<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Смешение режимов HTML и PHP</title>
</head>
<body>
	 



<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
?>
<h3>strpos(), должно быть, вернул не false</h3>
<p>Вы используете Internet Explorer</p>
<?php
} else {
?>
<h3>strpos() вернул false</h3>
<p>Вы не используете Internet Explorer</p>
<?php
}
?>



<!-- 	https://www.php.net/manual/ru/tutorial.useful.php -->
</body>
</html>
