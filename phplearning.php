<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы: синтаксис</title>
</head>
<body>
<!-- Пример #1 Определение констант -->
<?php  
define("CONSTANT", "Здравствуй, мир");
echo CONSTANT;
echo Constant;
?>


<!-- Пример #2 Определение констант с помощью ключевого слова const -->

<?php
// Простое скалярное значение
const CONSTANT = 'Здравствуй, мир.';

echo CONSTANT;

// Скалярное выражение
const ANOTHER_CONST = CONSTANT.'; Прощай, мир.';
echo ANOTHER_CONST;

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1]; // выводит "cat"

// Массивы в константе
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // выводит "cat"
?>


<!-- https://www.php.net/manual/ru/language.constants.syntax.php -->
</body>
</html>
