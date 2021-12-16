
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Безопасность. Сессии. Класс SessionHandler</title>
</head>
<body>

<?php//Пример #1 Использование SessionHandler для того, чтобы добавить шифровку данных ко внутреннему обработчику сессий PHP. 
/**
  * расшифровать данные, используя алгоритм AES 256
  *
  * @param data $edata
  * @param string $password
  * @return расшифрованные данные
  */
function decrypt($edata, $password) {
    $data = base64_decode($edata);
    $salt = substr($data, 0, 16);
    $ct = substr($data, 16);

    $rounds = 3; // зависит от длины ключа
    $data00 = $password.$salt;
    $hash = array();
    $hash[0] = hash('sha256', $data00, true);
    $result = $hash[0];
    for ($i = 1; $i < $rounds; $i++) {
        $hash[$i] = hash('sha256', $hash[$i - 1].$data00, true);
        $result .= $hash[$i];
    }
    $key = substr($result, 0, 32);
    $iv  = substr($result, 32,16);

    return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);
  }

/**
 * зашифровать данные алгоритмом AES 256
 *
 * @param data $data
 * @param string $password
 * @return base64 зашифрованные данные
 */
function encrypt($data, $password) {
    // Установить случайную соль
    $salt = openssl_random_pseudo_bytes(16);

    $salted = '';
    $dx = '';
    // Ключ соли (32) и вектор инициализации (16) = 48
    while (strlen($salted) < 48) {
      $dx = hash('sha256', $dx.$password.$salt, true);
      $salted .= $dx;
    }

    $key = substr($salted, 0, 32);
    $iv  = substr($salted, 32,16);

    $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);
    return base64_encode($salt . $encrypted_data);
}

class EncryptedSessionHandler extends SessionHandler
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function read($id)
    {
        $data = parent::read($id);

        if (!$data) {
            return "";
        } else {
            return decrypt($data, $this->key);
        }
    }

    public function write($id, $data)
    {
        $data = encrypt($data, $this->key);

        return parent::write($id, $data);
    }
}

// Здесь мы перехватываем встроенный обработчик 'files', но можно использовать любой другой
// обработчик, например 'sqlite', 'memcache' или 'memcached',
// которые предоставлены модулями PHP.
ini_set('session.save_handler', 'files');

$key = 'secret_string';
$handler = new EncryptedSessionHandler($key);
session_set_save_handler($handler, true);
session_start();

// устанавливаем и получаем значения из $_SESSION
  ?>



<!-- https://www.php.net/manual/ru/class.sessionhandler.php -->
</body> 
</html>




























