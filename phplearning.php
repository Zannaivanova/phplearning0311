
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интерфейс Stringable</title>
</head>
<body>

<?php //Пример #1 Простой пример использования Stringable
class IPv4Address implements stringable {
	private string $oct1;
	private string $oct2;
	private string $oct3;
	private string $oct4;

	public function __construct(string $oct1, string $oct2, string $oct3, string $oct4){
		$this->oct1 = $oct1;
		$this->oct2 = $oct2;
		$this->oct3 = $oct3;
		$this->oct4 = $oct4;
	}

	public function __toString(): string {
		return "$this->oct1.$this->oct2.$this->oct3.$this->oct4";
	}
}

function showStuff(string|Stringable $value){
	print $value;
}

$ip = new IPv4Address('123','234', '42', '9');

showStuff($ip);

 ?>

<!-- https://www.php.net/manual/ru/class.stringable.php -->

</body> 
</html>




























