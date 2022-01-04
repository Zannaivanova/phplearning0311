<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readline</title>    
</head>
<body>
<?php//Пример #1 Пример использования callback-интерфейса readline
function rl_callback($ret){

  global $c, $prompting;

  echo "Вы ввели: $ret ";
  $c++;
  if ($c>10){
    $prompting = false;
    readline_callback_handler_remove();
  } else {
    readline_callback_handler_install("[$c]Поговори со мной: ", 'rl_callback');
  }
}
$c = 1;
$prompting = true;
readline_callback_handler_install("[$c] Введите что-нибудь", 'rl_callback');

while($prompting){
    $w = NULL;
    $e = NULL;
    $n - stream_select($r = array(STDIN), $w, $e, null);
    if ($n && in_array(STDIN, $r)){
        readline_callback_read_char();
    }
}
echo "Ввод отключеню Спасибо за внимание";
?>

<?php //Пример #1 Пример использования readline()
//получим 3 команды от пользователя
for ($i=0; $i < 3; $i++) {
        $line = readline("Command: ");
        readline_add_history($line);
}

//распечатаем историю ввода
print_r(readline_list_history());

//распечатаем переменные
print_r(readline_info());
?>



<!-- https://www.php.net/manual/ru/radius.constants.attributes.php -->
</body> 
</html>




























