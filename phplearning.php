
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HTTP-аутентификация в PHP</title>
</head>
<body>
<?php //Пример #1 Пример Basic HTTP-аутентификации
if(!isset($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'Текст, отправленный в том случае, если пользователь нажал кнопку Cancel';
	exit;
} else{
	echo"<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
	echo "<p>Вы ввели пароль {$_SERVER['PHP_AUTH_PW']}.</p>";
}
 ?>


<?php  //Пример #2 Пример Digest HTTP-аутентификации
$realm = 'Запретная зона';

$users = array('admin'=>'mypass', 'guest'=>'guest');

if(empty ($_SERVER['PHP_AUTH_DIGEST'])){
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

	die('Тескт, отправляемый в том случае, если ползователь нажал кнопку Cancel');
}

if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Неправильные данные!');

$A1 = md5($data['username']. ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD']. ':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response']!=$valid_response)
die('Неправильные данные');

echo 'Вы вощли как: '. $data['username'];

function http_digest_parse($txt){
	$needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
	$data = array();
	$keys = implode('|', array_keys($needed_parts));

	preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

	foreach ($matches as $m){
       $data[$m[1]] = $m[3]?$m[3]:$m[4];
		unset($needed_parts[$m[1]]);
	}

	return $needed_parts ? false:$data;
}

?>

<?php //Пример #3 Пример HTTP-аутентификации с принудительным вводом новой пары логин/пароль
function authenticate(){
	header('WWW-Authenticate: Basic realm="Test Authentication System"');
	header('HTTP/1.0 401 Unauthorized');
	echo "Вы должны ввести корректный логин и пароль для получения доступа к ресурсу";
	exit;
}

if(!isset($_SERVER['PHP_AUTH_USER']))||
	($_POST['SeenBefore']) == 1 && $_POST['[OldAuth]'] == $_SERVER['variable'](){
		authenticate();
	} else {
		echo "<p>Добро пожаловать: ".htmlspecialchars($_SERVER['PHP_AUTH_USER']) ."<br/>";
		echo "Предыдущий логин: ". htmlspecialchars($_REQUEST['OldAuth']);
		echo "<form action='' method = 'post'>\n";
		echo "<input type='hidden' name = 'SeenBefore' value = '1'/>\n";
        echo "<input type='hidden' name='OldAuth' value=\"" . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "\" />\n";
    	echo "<input type='submit' value='Авторизоваться повторно'/>\n";
    	echo"</form></p>\n";
    	}
 ?>


<!-- https://www.php.net/manual/ru/features.http-auth.php -->
</body> 
</html>




























