<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RADIUS</title>    
</head>
<body>
<?php //Пример #1 Использование паролей CHAP
$radth = radius_auth_open();
radius_add_server($radh, $server, $port, $secret, 3, 3);
radius_create_request($radh, RADIUS_ACCESS_REQUEST);

$challenge = mt_rand();

$ident = 1;

$cp = md5(pack('Ca*', $ident, $password.$challenge), true);
radius_put_attr($radh, RADIUS_CHAP_PASSWORD, pack('C', $ident).$cp);

radius_put_attr($radh, RADIUS_CHAP_CHELLENGE, $challenge);
 ?>

<!-- https://www.php.net/manual/ru/radius.constants.attributes.php -->
</body> 
</html>




























