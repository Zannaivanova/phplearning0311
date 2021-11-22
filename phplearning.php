<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Анонимные функции</title>
</head>
<body>

<?php //Пример #1 Пример анонимной функции
echo preg_replace_callback('~-([a-z])~', function ($match){
return strtoupper($match[1]);
}, 'hello-world');
 ?>


<?php//Пример #2 Пример присвоения анонимной функции переменной
$greet = function($name){
	printf("привет, %s\r\n", $name);
} ;

$greet('Мир');
$greet('PHP');
?>


<?php  //Пример #3 Наследование переменных из родительской области видимости
$message = 'привет';

// Без "use"
$example = function(){
	var_dump($message);
};
$example();

// Наследуем $message
$example = function() use ($message){
	var_dump($message);
};
$example();


// Значение унаследованной переменной задано там, где функция определена,
// но не там, где вызвана
$message = 'мир';
$example();


// Сбросим message
$message = 'привет';


// Наследование по ссылке
$example = function()  use (&$message){
	var_dump($message);
};
$example();


// Изменённое в родительской области видимости значение
// остаётся тем же внутри вызова функции
$message = 'мир';
echo $example();


// Замыкания могут принимать обычные аргументы
$example = function ($arg) use ($message) {
	var_dump($arg .', ' .$message);
};
$example("привет");


// Объявление типа возвращаемого значения идет после конструкции use
$example = function( use ($message): string{
	return "привет $message";
};
var_dump($example());
)
?>


<?php //Пример #4 Замыкания и область видимости
// Базовая корзина покупок, содержащая список добавленных
// продуктов и количество каждого продукта. Включает метод,
// вычисляющий общую цену элементов корзины с помощью
// callback-замыкания.

class Cart{
	const PRICE_BUTTER = 1.00;
	const PRICE_MILK = 3.00;
	const PRICE_EGGS = 6.95;

	protected $products = array();

	public function add($product, $quantity){
		$this->products[$product] = $quantity;
	}

	public function getQuantity($product){
		return isset($this->product[$product]) ? $this ->products[$product]: FALSE;
	}

	public function getTotal($tax){
		$total = 0.00;

		$callback = function($quantity, $product) use ($tax, &$total){
			$pricePerItem = constant(__Class__ . "::PRICE" .strtoupper($product));
			$total +=($pricePerItem*$quantity)*($tax + 1.0); 
		};
		array_walk($this->products, $callback);
		return round($total, 2);
	}
}

$my_cart = new Cart;

// Добавляем несколько элементов в корзину
$my_cart->add('butter', 1);
$my_cart('milk', 3);
$my_cart->add('eggs', 6);

// Выводим общую сумму с 5% налогом на продажу.
print $my_cart->getTotal(0.05) . "\n";

// Результатом будет 54.29
?>


<?php //Пример #5 Автоматическое связывание $this
class Test{
	public function testing(){
		return function(){
			var_dump($this);
		};
	}
}

$object = new Test;
$function = $oject->testing();
$function();

 ?>


<?php  //Пример #6 Попытка использовать $this в статической анонимной функции (NULL)
class Foo{
	function __construct(){
		$func = static function(){
			var_dump($this);
		};
		$func();
	}
};
new Foo();

?>


<?php //Пример #7 Попытка связать объект со статической анонимной функцией(Warning)
$func = static function(){

};
$func = $func->bindTo(new StdClass);
$func();

 ?>

<!-- https://www.php.net/manual/ru/functions.anonymous.php-->
</body> 
</html>
