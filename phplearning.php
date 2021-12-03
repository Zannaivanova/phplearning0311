<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Позднее статическое связывание</title>
</head>
<body>

    <?php  //Пример #1 Использование self::
    class A {
        public static function who(){
            echo __CLASS__;
            }
        public static function test(){
            self::who();
        }
    }

class B extends A{
    public static function who(){
        echo __CLASS__;
    }
}    

B::test();
?>


<?php //Пример #2 Простое использование static::
class A {
    public static function who(){
        echo __CLASS__;
    }

    public static function test(){
        static::who();// Здесь действует позднее статическое связывание
    }
}  

class B extends A{
    public static function who(){
        echo __CLASS__;
    }
}

B::test();
?>


<?php  //Пример #3 Использование static:: в нестатическом контексте
class A{
    private function foo(){
        echo "success!\n";
    }

    public function test(){
        $this->foo();
        static::foo();
    }
}

class B extends A{
     /* foo() будет скопирован в В, следовательно его область действия по прежнему А,
      и вызов будет успешным */
}

class C extends A{
    private function foo(){
                /* исходный метод заменён; область действия нового метода - С */
    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();   // потерпит ошибку
?>


<?php  //Пример #4 Перенаправленные и неперенаправленные вызовы
class A {
    public static function foo(){
        static::who();
    }

    public static function who(){
        echo __CLASS__ . "\n";
    }
}

class B extends A{
    public static function test(){
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function who(){
        echo __CLASS__ . "\n";
    }
}

class C extends B{
    public static function who(){
        echo __CLASS__ ."\n";
    }
}

C::test();
?>
<!-- https://www.php.net/manual/ru/language.oop5.late-static-bindings.php -->
</body> 
</html>
