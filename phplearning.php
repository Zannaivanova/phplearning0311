<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componere</title>    
</head>
<body>

<!--     Componere\Abstract\Definition — Класс Componere\Abstract\Definition
        Componere\Abstract\Definition::addInterface — Добавляет интерфейс
        Componere\Abstract\Definition::addMethod — Добавляет метод
        Componere\Abstract\Definition::addTrait — Добавляет трейт
        Componere\Abstract\Definition::getReflector — Reflection
    Componere\Definition — Класс Componere\Definition
        Componere\Definition::__construct — Определение конструктора
        Componere\Definition::addConstant — Добавляет константу
        Componere\Definition::addProperty — Добавляет свойство
        Componere\Definition::register — Регистрация
        Componere\Definition::isRegistered — Определение состояния
        Componere\Definition::getClosure — Получает замыкание
        Componere\Definition::getClosures — Получает замыкание
    Componere\Patch — Класс Componere\Patch
        Componere\Patch::__construct — Конструктор класса Patch
        Componere\Patch::apply — Приложение
        Componere\Patch::revert — Отмена
        Componere\Patch::isApplied — Определение состояния
        Componere\Patch::derive — Получение патча
        Componere\Patch::getClosure — Получает замыкание
        Componere\Patch::getClosures — Получает замыкания
    Componere\Method — Класс Componere\Method
        Componere\Method::__construct — Конструктор класса Method
        Componere\Method::setPrivate — Изменение доступности
        Componere\Method::setProtected — Изменение доступности
        Componere\Method::setStatic — Изменение доступности
        Componere\Method::getReflector — Reflection
    Componere\Value — Класс Componere\Value
        Componere\Value::__construct — Конструктор класса Value
        Componere\Value::setPrivate — Изменение доступности
        Componere\Value::setProtected — Изменение доступности
        Componere\Value::setStatic — Изменение доступности
        Componere\Value::isPrivate — Определение доступности
        Componere\Value::isProtected — Определение доступности
        Componere\Value::isStatic — Определение доступности
        Componere\Value::hasDefault — Взаимодействие с классом Value
    Функции Componere
        Componere\cast — Приведение к типу
        Componere\cast_by_ref — Приведение к типу
 -->

<?php //Обзор классов
final abstract class Componere\Abstract\Definition {
    public addInterface (string $interface): Definition
    public addMethod(string $name, Componere\Method $method): Definition
    public addTrait(string $trait): Definition
    public getReflector(): ReflectionClass
}

 ?>

<!-- https://www.php.net/manual/ru/book.componere.php -->
</body> 
</html>


























