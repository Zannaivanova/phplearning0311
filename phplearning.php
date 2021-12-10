
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сравнение генераторов с объектами класса Iterator </title>
</head>
<body>

<?php 
function getLinesFromFile($fileName){
	if (!$fileHandle = fopen($fileName, 'r')){
		return;
	}

	while (false !==$line = fgets($fileHandle)){
		yield $line;
	}

	fclose($fileHandle);
}  

class LineIterator implements Iterator{
	protected $fileHandle;

	protected $line;
	protected $i;

	public function __construct($fileName){
		if (!$this->fileHandle = fopen($fileName, 'r')){
			throw new RuntimeException('Невозможно открыть файл' . $fileName . '"');
		}
	}

	public function rewind(){
		fseek($this->fileHandle, 0);
		$this->line = fget($this->fileHandle);
		$this->i = 0;
	}

	public function valid(){
		return false !==$this->line;
	}

	public function current(){
		return $this->line;
	}

	public function key(){
		return $this->i;
	}

	public function next(){
		if (false !== $this->line){
			$this->line = fgets($this->fileHandle);
			$this->i++;
		}
	}

	public function __destruct(){
		fclose($this->fileHandle);
	}
}

?>


<!-- https://www.php.net/manual/ru/language.generators.comparison.php -->
</body> 
</html>




























