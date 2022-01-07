<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Хеширование паролей</title>    
</head>
<body>
<?php //Пример #1 Пример использования password()
print_r(password_algos());
 ?>


<?php //Пример #1 Пример использования password_hash()
echo password_hash("rasmusredorf", PASSWORD_DEFAULT);
 ?>


<?php //Пример #2 Пример использования password_hash() с ручным заданием стоимости
$options = [
'cost'=>12,];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
?>

<?php //Пример #3 Пример поиска хорошего значения стоимости для password_hash()
$timeTarget= 0.05;
$cost = 8;
do{
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost"=>$cost]);
    $end = microtime(true);
} while (($end - $start)<$timeTarget);

echo "Оптимальная стоимость: ". $cost;
 ?>

<?php //Пример #4 Пример использования password_hash() с Argon2i
echo 'хеш Argon2i: ' .password_hash('rasmuslerdorf', PASSWORD_ARGON2I);
 ?>


<?php ///Пример #1 Пример использования password_needs_rehash()
$password = "rasmuslerdorf";
$hash = '$2y$10$YCFsG6elYca568hBi2pZ0.3LDL5wjgxct1N8w/oLR/jfHsiQwCqTS';
$options = array('cost'=>11);

if(password_verify($password, $this)){
    if(password_needs_rehash($hash, PASSWORD_DEFAULT)){
        $newHash = password_hash($password. PASSWORD_DEFAULT, $options);
    }
}
 ?>

<?php //Пример #1 Пример использования password_verify()
// Смотрите пример использования password_hash(), для понимания откуда это взялось.
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
if (oassword_verify('rasmuslardorf', $hash)){
    echo 'Пароль правильный';
} else {
    'Пароль неправильный';
}
 ?>


<!-- https://www.php.net/manual/ru/book.password.php -->
 </body> 
   </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
