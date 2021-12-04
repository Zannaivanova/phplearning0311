<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Описание нескольких пространств имён в одном файле</title>
</head>
<body>

<?php  //Пример #1 Описание нескольких пространств имён, простой синтаксис
namespace MyProject;

const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}

namespace AnotherProject;

const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
?>


<?php //Пример #2 Описание нескольких пространств имён, синтаксис со скобками
namespace MyProject{

const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
 }

 namespace AnotherProject{

const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
 }
 ?>


<?php  //Пример #3 Описание глобального и обычного пространства имён в одном файле
namespace MyProject{

    const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
}

namespace{
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}
?>

<?php  //Пример #4 Описание глобального и обычного пространства имён в одном файле

declare(encoding = 'UTF-8');
namespace MyProject{

    const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
}

namespace{
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}
?>



<!-- https://www.php.net/manual/ru/language.namespaces.definitionmultiple.php -->
</body> 
</html>
