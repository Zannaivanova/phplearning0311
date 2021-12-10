
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Синтаксис генераторов</title>
</head>
<body>

<?php //Пример #1 Простой пример выдачи значений
function gen_one_to_three(){
	for ($i = 1; $i<=3; $i++){
		yield $i;
	}
}

$generator = gen_one_to_three();
foreach ($generator as $value){
	echo "$value\n";
} ?>


<?php //Пример #2 Получение пар ключ/значение

$input =<<<'EOF'
1;PHP;Любит знаки доллара
2;Python;Любит пробелы
3;Ruby;Любит блоки
EOF;

function input_parser($input){
	foreach (explode("\n", $input) as $line){
		$fields = explode(';', $line);
		$id = array_shift($fields);

		yield $id => $fields;
	}
} 


foreach (input_parser($input) as $id=>$fields){
	echo "$id:\n";
	echo "   $fields[0]\n";
	echo "   $fields[1]\n";
}
 ?>

 <?php  //Пример #3 Получение null
 function gen_three_nulls(){
 	foreach (range(1,3) as $i){
 		yield;
 	}
 }

 var_dump(iterator_to_array(gen_three_nulls()));
 ?>



<?php//Пример #4 Получение значений по ссылке
function &gen_reference(){
	$value = 3;

	while($value>0){
		yield $value;
	}
}  

foreach (gen_reference() as &$number){
	echo (--$number). '... ';
}
?>


<?php //Пример #5 yield from с iterator_to_array()
function inner(){
	yield 1;
	yield 2;
	yield 3;
}

function gen(){
	yield 0;
	yield from inner();
yield 4;
}

var_dump(iterator_to_array(gen()));
 ?>


<?php //Пример #6 Основы использования yield from
function count_to_ten(){
	yield 1;
	yield 2;
	yield from [3,4];
	yield from seven_eight();
	yield 9;
	yield 10;
}

function seven_eight(){
	yield 7;
	yield from eight();
}


function eight(){
	yield 8;
}

foreach (count_to_ten() as $num){
	echo "$num ";
}
 ?>


<?php  //Пример #7 yield from и возвращаемые значения
function count_to_ten(){
	yield 1;
	yield 2;
	yield from [3,4];
	yield from new ArrayIterator([5,6]);
    yield from seven_eight();
return yield from nine_ten();
}

function seven_eight(){
	yield 7;
	yield from eight();
}


function eight(){
	yield 8;
}


function nine_ten(){
	yield 9;
	return 10;
}

$gen = count_to_ten();
foreach ($gen as $num){
	echo "$num ";
}

echo $gen->getReturn();
?>



<!-- https://www.php.net/manual/ru/language.generators.syntax.php -->
</body> 
</html>




























