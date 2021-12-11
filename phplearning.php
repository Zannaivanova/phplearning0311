
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Объявление классов атрибутов</title>
</head>
<body>

<?php  //Пример #1 Простой класс с атрибутом
namespace Example;

use Attribute;

#[Attribute]

class MyAttribute
{

}
?>


<?php  //Пример #2 Ограничение допустимых целей для использования атрибута
namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
class MyAttribute
{

}
?>


<?php  //Пример #3 Использование IS_REPEATABLE для разрешения использовать атрибут в объявлении несколько раз
namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD| Attribute::TARGET_FUNCTION| Attribute::IS_REPEATABLE)]

class MyAttribute
{

}

?>



<!-- https://www.php.net/manual/ru/language.attributes.classes.php -->
</body> 
</html>




























