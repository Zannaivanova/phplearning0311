<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Класс APCUIterator</title>    
</head>
<body>

class APCUIterator implements Iterator {
public __construct(
array|atring|null $search = null,
int $format = APC_ITER_ALL,
int $chunk_size = 100,
int $list = APC_LIST_ACTIVE)
PUBLIC CURRENT(): mixed
public getTotalCount(): int
public getTotalHits(): int
public key(): string
public next(): bool
public rewind(): void
public valid(): bool
}

    <!-- APCUIterator::__construct — Создаёт объект итератор класса APCUIterator -->
    <?php //Пример #1 Пример использования APCUIterator::__construct()
    foreach (new APCUIterator('/^counter\./') as $counter) {
        echo "$counter[key]: $counter[value]\n";
        apc_dec($counter['key'], $counter['value']);
    } 
     ?>

 <!-- APCUIterator::current — Получить текущий элемент 
    APCUIterator::getTotalCount — Получить общее количество записей
    APCUIterator::getTotalHits — Получить общее количество попаданий в кеш
    APCUIterator::getTotalSize — Общий размер кеша
    APCUIterator::key — Получить ключ итератора
    APCUIterator::next — Перемещает указатель на следующий элемент
    APCUIterator::rewind — Перемотка итератора
    APCUIterator::valid — Проверяет, корректна ли текущая позиция итератора-->


<!-- https://www.php.net/manual/ru/class.apcuiterator.php -->
</body> 
</html>


























