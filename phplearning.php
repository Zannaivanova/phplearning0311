
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Безопасность. Сессии. Класс SessionHandlerInterface</title>
</head>
<body>

	<?php//Пример #1 Пример использования SessionHandlerInterface 
class MySessionHandler implements SessionHandlerInterface {
	private $savePath;
	public function open($savePath, $sessionName):bool{
		$this->savePath = $savePath;
		if(!is_dir($this->$savePath)){
			mkdir($this->savePath, 0777);
		}
		return true;
	}

	public function close():bool{
		return true;
	}

	#[ReturnTypeWillChange]
	public function read($id){
		return (string)@file_get_contents("$this->savePath/sess_$id");
	}

	public function write($id, $data): bool{
		return file_put_contants("$this->savePath/sess_$id", $data) ===false?false:true;
	}
	public function destroy ($id):bool{
		$file = "$this->savePath/sess_$id";
		if (file_exists($file)){
			unlink($file);
		}
		return true;
	}

	#[ReturnTypeWillChange]
	public function gc($maxlifetime){
		foreach (glob("$this->savePath/sess_*")as $file){
			if (filetime($file)+$maxlifetime<time()&&file_exists($file)){
				unlink($file);
			}
		}
		return true;
	}
}
$handler = new MySessionHandler();
session_set_save_handler($handler, true);
session_start();
	 ?>


<!-- https://www.php.net/manual/ru/class.sessionhandlerinterface.php -->
</body> 
</html>




























