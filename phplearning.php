
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Генераторы</title>
</head>
<body>

<?phpПример #1 Реализация range() как генератора
function xrange($start, $limit, $step = 1){
	if($start<= $limit){
		if($step <=0){
			throw new LogicException('Шаг должен быть положительным');
		}

		for ($i = $start; $i<=$limit; $i +=$step){
			yield $i;}
		} else {
			if($step>=0){
				throw new LogicException('Шаг должен быть отрицательным');
			}

			for ($i  = $start; $i>= $limit; $i +=$step){
				yield $i;
			
		}
	}
}

echo 'Нечетные однозначные числа с помощью xrange(): ';
foreach (xrange(1,9,2) as $number){
	echo "$number";
}

  ?>

<!-- https://www.php.net/manual/ru/language.generators.php -->
</body> 
</html>




























