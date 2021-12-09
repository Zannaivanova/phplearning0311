
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Перечисления </title>
</head>
<body>

 
<!-- Содержание 

    Обзор перечислений
    Основы перечислений
    Типизированные перечисления
    Методы перечислений
    Статические методы перечислений
    Константы перечислений
    Трейты
    Значения перечисления в постоянных выражениях
    Отличия от объектов
    Список значений
    Сериализация
    Примеры -->

<?php  //1.Методы перечислений
interface Colorful{
	public function color():string;
}

enum Suit implements Colorful {
	case Hearts;
	case Diamonds;
	case Clubs;
	case Spades;

	public function color(): string{
		return match($this){
			Suit::Hearts, Suit::Diamonds =>'Красный',
			Suit::Clubs, Suit::Spades =>'Черный'
		};
	}

	public function shape(): string{
		return "Rectangle";
	}
}

function paint(Colorful $c){ ... }

paint(Suit::Clubs);

print Suit::Diamonds->shape();
?>


<?php //2.Методы перечислений

interface Colorful{
	public function color(): string;
}

enum Suit: string implements Colorful{
	case Hearts = 'H';
	case Diamonds = 'D';
	case Clubs = 'C';
	case Spades = 'S';

	public function color(); string{
		return function color():string{
			return match($this){
				Suit::Hearts, Suit::Diamonds =>'Красный',
				Suit::Clubs, Suit::Spades =>'Черный'
			} ;
		}
	}
 ?>


<?php   //3.Методы перечислений
interface Colorful{
	public function color(); string;
}

final class Suit implements UnitEnum, Colorful{
	public const Hearts = new self('Hearts');
	public const Diamonds = new self('Diamonds');
	public const Clubs = new self('Clubs');
	public const Spades = new self('Spades');

	private function __construct(public readonly string $name){}

	public function color(): string{
		return match(this){
			Suit::Hearts, Suit::Diamonds => 'Красный',
			Suit::Clubs, Suit::Spades => 'Черный '
		} ;
	}

	public function shape(); string{
		return "Прямоугольник";
	}

	public static function cases():array{

	}
}

?>


<?php //Статические методы перечислений 
enum Size{
	case Small;
	case Medium;
	Case Large;

	public static function fromLenght(int $cm): static{
		return match(true){
			$cm<50 => static::Small,
			$cm<100 => static::Medium,
			default =>static::Large,
		};
	}
}
 ?>


<?php //Константы перечислений 
enum Size{
	case Small;
	case Medium;
	case Large;

	public const Huge = self::Large;
}
 ?>

 <?php  //Трейты 
 interface Colorful{public function color(); string;}

trait Rectangle{
	public function shape(): string{
		return "Прямоугольник";
	}
}

enum Suit implements Colorful{
	use Rectangle;

    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    public function color(): string{
    	return match($this){
    		Suit::Hearts, Suit::Diamonds=>'Красный',
    		Suit::Clubs, Suit::Spades => 'Черный'б
    	} ;
    }
}
 ?>


 <?php  //Значения перечисления в постоянных выражениях 
 enum Direction implements ArrayAccess{
 	case Up;
 	case Down;

 	public function offsetGet($val){...}
 	public function offsetExists($val){...}
 	public function offsetSet($val){ throw new Exception(); }
 	public function offsetUnset($val){ throw new Exception(); }

 }

 class Foo{
 	const Bar = Direction::Down;
    const Bar = Direction::Up['short'];
 }

$x = Direction::Up['short'];
 ?>




<!-- https://www.php.net/manual/ru/language.enumerations.php -->
</body> 
</html>
