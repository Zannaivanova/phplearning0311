<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Управляющие конструкции</title>
</head>
<body>

<!--       if      -->
  <?php  
if  ($a > $b)
    echo "a больше b";
  ?>


<!--       else     -->
  <?php  
if ($a > $b){
    echo "a больше b";
} else {
    echo"a НЕ больше b";
}
 ?>



<!--       elseif/else if     -->

   <?php  /* пример 1 */
if ($a > $b) {
    echo "a больше b";
}  elseif ($a == $b) {
    echo "a равен b";
} else {
    echo "a меньше b";
}
   ?>

   <?php  /* пример 2 */
if ($a > $b):
    echo $a. " больше, чем".$b;
elseif($a == $b):
    echo $a. "равно" .$b;
else:
    echo $a. "не больше и не равно".$b;
endif;
   ?>



<!--       Альтернативный синтаксис управляющих структур     -->
<?php if ($a == 5): ?>
    A равно 5
<?php endif; ?>


<!--       while     -->
<?php  /* пример 1 */
$i = 1;
while ($i <= 10){
    echo $i++;
}
   ?>

   <?php  /* пример 2 */
$i = 1;
while ($i<=10):
    echo $i;
    $i++;
endwhile;
   ?>



<!--       do-while     -->
   <?php  
$i = 0;
do {
    echo $i;
 } while ($i >0);
   ?>




<!--       for     -->
   <?php  /* пример 1 */
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
   ?>

   <?php  /* пример 2 */
for ($i = 1; $i++){
    if ($i>10){
        break;
    }
    echo $i;
}
   ?>
   <?php  /* пример 3 */
$i=1;
for (; ; ) {
    if ($i>10){
        break;
    }
    echo $i;
    $i++;
}
   ?>

   <?php  /* пример 4 */
for ($i = 1, $j<=10; $j +=$i, print $i, $i++);
   ?>




<!--       foreach     -->

<?php
/* Пример 1: только значение */
$a = array(1,2,3,17);

foreach ($a as $v){
    echo "Текущее значение переменной \a: $v. \n";
}


/* Пример 2: значение (для иллюстрации массив выводится в виде значения с ключом) */
$a = array(1,2,3,17);

$i = 0;

foreach ($a as $v) {
echo "\$a[$i] => $v.\n";
$i++;
}


/* Пример 3: ключ и значение */
$a = array(
"one" => 1,
"two" => 2,
"three" => 3,
"seventeen" => 17);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}


/* Пример 4: многомерные массивы */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1){
    foreach ($v1 as $v2){
        echo "$v2\n";
    }
}


/* Пример 5: динамические массивы */
foreach (array(1,2,3,4,5) as $v) {
    echo "$v\n";
}
 ?>

   <?php  /* Пример:Распаковка вложенных массивов с помощью list() */
$array = [
[1,2],
[3,4],
];

foreach ($array as list($a, $b)){
    // $a содержит первый элемент вложенного массива,
    // а $b содержит второй элемент.
    echo"A: $a; B: $b";
}
   ?>




<!--       break     -->
  <?php  
$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');
foreach ($arr as $val){
    if ($val == 'стоп'){
        break;    /* Тут можно было написать 'break 1;'. */
    }
    echo "$val<br />\n";
} 

/* Использование дополнительного аргумента. */
$i = 0;
while(++$i){
    switch ($i) {
        case 5:
         echo "Итерация 5<br />\n";
         break 1;/* Выйти только из конструкции switch. */
        case 10:
         echo "Итерация 10; выходим<br />\n";
         break 2;/* Выходим из конструкции switch и из цикла while. */
        default:
         break;
    }
}

  ?>




<!--       continue     -->
   <?php 
foreach ($arr as $key => $value)
{
    if (!($key % 2)){
        continue;
    }
    do_something_odd($value);
}
$i = 0;
while ($i < 5){
    echo "Снаружи <br />\n";
 while (1){
    echo "В середине <br />\n";
    while (1){
        echo "Внутри <br />\n";
        continue 3;
    }
    echo "Это никогда не будет выведено. <br />\n";
 }
 echo "Это тоже. <br />\n";
}    
 ?>




<!--       switch      -->
  <?php /* Пример1:Оператор switch*/
if ($i == 0){
    echo "i равно 0";
} elseif ($i == 1){
    echo "i равно 1";
}  elseif ($i == 2){
    echo"i равно 2";
}

switch($i){
    case 0:
      echo "i равно 0";
      break;
    case 1:
      echo "i равно 1";
      break;
    case 2:
      echo "i равно 2";
      break;
}   ?>

  <?php  /* Пример2: Оператор switch допускает сравнение с типом string*/
switch ($i){
       case "яблоко";
         echo "i это яблоко";
         break;
       case "шоколадка";
         echo "i это шоколадка";
         break;
       case ""пирог;
        echo "i это пирог";
        break;
}
?>



<!--       match     -->
    <?php  
$food = 'cake';
$return_value = match ($food)
{
    'apple' => 'На столе лежит яблоко',
    'banana' => 'На столе лежит банан',
    'cake' => 'На столе стоит торт',
};

var_dump($return_value);
    ?>




<!--         declare     -->
   <?php /* Пример1: Пример использования тика*/ 
declare(ticks=1);

);

// Функция, исполняемая при каждом тике
function tick_handler(){
    echo "Вызывается tick_handler()\n";
}

register_tick_function('tick_handler');// вызывает событие тика

$a = 1;
if($a > 0){
$a +=2;// вызывает событие тика
print($a);}// вызывает событие тика
   ?>

<?php /* Пример2: Определение кодировки для скрипта.*/ 
declare(encoding='ISO-8859-1');
   ?>


<!--         return     -->
<!--         require     -->
<!--         include     -->
<!--         require_once     -->
<!--         include_once     -->
<!--         goto      -->

    <!-- https://www.php.net/manual/ru/language.control-structures.php -->
    </body> 
</html>
