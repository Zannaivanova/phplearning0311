<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenSSL</title>    
</head>
<body>

<?php //Пример #1 Пример использования openssl_cipher_iv_length()
$method = 'AES-128-CBC';
$ivlen = openssl_cipher_iv_lenght($method);

echo $ivlen;
 ?>

<?php //Пример #1 Пример использования openssl_cms_sign()
openssl_cms_sign('input.txt', 'output.txt', 'file://cert.pem', 'file://privkey.pem', null, OPENSSL_CMS_BINARY, OPENSSL_ENCODING_DER, 'chain.pem');
 ?>

 <?php //Пример #1 Пример использования openssl_csr_export_to_file()
$subject = array("commonName"=> "example.com", );

$private)key = openssl_pkey_new(array("private_key_bits"=>2048,
"private_key_type"=> OPENSSL_KEYTYPE_RSA,));
$csr = openssl_csr_new($subject, $private_key, array('digest_alg' =>'sha384'));
openssl_pkey_export_to_file($private_key, 'example-priv.key');
openssl_csr_export_to_file($csr, 'example-csr.pem');
  ?>

<?php //Пример #1 Пример использования openssl_csr_export()
$subject = array("
    commonName"=> "example.com", );
$private_key = openssl_pkey_new(arra("
    private_key_bits"=>2048,
    "private_key_type"=> OPENSSL_KEYTYPE_RSA,));
$configargs = array(
'digest_alg'=>'sha256WithRSAEncryption');
$csr = openssl_csr_new($subject, $private_key, $configargs);
openssl_crs_export($csr, $csr_string);
echo $csr_string;
 ?>

<?php //Пример #1 Пример использования openssl_csr_get_public_key()
$subject = array(
"commonName"=> "example.com",);
$private_key = openssl_pkey_new(array(
"private_key_bits"=>2048,
"private_key_type"=> OPENSSL_KEYTYPE_RSA,
));
$csr = openssl_csr_new($subject, $private_key, array('digest_alg'=> 'sha256'));
$public_key = openssl_csr_get_public_key($csr);
$info = openssl_pkey_get_details($public_key);
echo $info['key'];
 ?>


<?php //Пример #1 Пример использования openssl_csr_get_subject()
$subject = array(
"countryName"=>"CA",
"stateOrProvinceName"=>"Alberta",
"localityName"=>"Calgary",
"organizationName"=> "PHP Documentation Team",
"commonName"=> "Wrez Furlong",
"emailAddress"=>"wez@example.com",);
$private_key = openssl_pkey_new(array(
"private_key_bits"=>2048,
"private_key_type"=>OPENSSL_KEYTYPE_RSA,));
$configargs = array(
'digest_alg'=> 'sha512WithRSAEncryption');
$csr = openssl_csr_new($subjet, $privkey, $configargs);
print_r(openssl_csr_get_subject($csr));
 ?>

 <?php //Пример #1 Создание самоподписанного сертификата
$dn = array("countryName" => "GB",
    "stateOrProvinceName" => "Somerset",
    "localityName" => "Glastonbury",
    "organizationName" => "The Brain Room Limited",
    "organizationalUnitName" => "PHP Documentation Team",
    "commonName" => "Wez Furlong",
    "emailAddress" => "wez@example.com"
);

$privkey = openssl_pkey_bits_new(array(
"private_key_bits"=>2048,
"private_key_type"=> OPENSSL_KEYTYPE_RSA,));

$csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));

$x509 = openssl_csr_sign($csr, null, $privkey, $day = 365, array('digest_alg'=>'sha256'));

openssl_x509_export($x509, $certout) and var_dump($certout);
openssl_pkey_export($privkey, $pkeyout, "mypassword") and var_dump($pkeyout);
while(($e = openssl_error_string())!==false){
    echo $e ."\n";
}  ?>


<?php //Пример #2 Создание самоподписанного ECC сертификата (начиная с PHP 7.1.0)
$subjet = array(
"commonName"=>"docs.php.net",);
$private_key_type=>OPENSSL_KEYTYPE_EC,
"curve_name"=> 'prime256v1',
));

$csr = openssl_csr_new($subject, $private_key, array('digest_alg'=> 'sha384'));

$x509 = openssl_csr_sign($csr, null, $private_key, $day=365, array('digest_alg'=>'sha384'));
openssl_x509_export_to_file($x509, 'ecc-cert.pem');
openssl_pkey_export_to_file($private_key, 'ecc-private.key');
 ?>


 <?php //Пример #1 Пример openssl_csr_sign() - подпись CSR (как сделать свой собственный CA)

 $csrdata = $_POST["CSR"];

 $carcert = "file://path/to/ca.crt";
$privkey = array("file://path/to/ca.key", "your_ca_key_passphrase");


$usercert = openssl_csr_sign($csrdata, $carcert, $privkey, 365, array('digest_alg'=>"sha256"));

openssl_x509_export($usercert, $certout);
echo $certout;

while (($e = openssl_error_string())!==false){
    echo $e .;
}  ?>


<?php //Пример #1 Пример шифрования AES с аутентификацией в режиме GCM в PHP 7.1+
$plaintext = "даннве для  шифрования"ж
$cipher = "aes-128-gcm";
if (in_array($cipher, openssl_get_cipher_methods())){
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = 0, $iv, $tag);
    $original-plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options = 0, $iv, $tag);
    echo $original_plaintext.;
 }?>

<?php //Пример #2 Пример шифрования AES с аутентификацией до PHP 7.1
$plaintext = "данные для шифрования"
$ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaint, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv)
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
$ciphertext = base64_encode($iv.$hmac.$ciphertext_raw);

$c = base64_decode($ciphertext);
$ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, 0, $ivlen);
$ciphertext_raw = substr($c, $ivlen+$sha2len);
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
if (hash_equals($hmac, $calcmac)){
    echo $original_plaintext."\n";
}
?>

<?php //Пример #1 Пример использования openssl_error_string()
while ($msg = openssl_error_stribg())
    echo $msg . "<br/>";
 ?>


<?php //Пример #1 Пример использования openssl_get_cipher_methods()
$ciphers = openssl_get_cipher_methods();
$ciphers_and_aliases = openssl_get_cipher_methods(true);
$cipher_aliases = array_diff($ciphers_and_aliases, $ciphers);

$ciphers = array_filter($ciphers, function($n){return stripos($n, "ecb"===FALSE;)});

$ciphers = array_filter($ciphers, function($c){return stripos($c, "des")===FALSE;});
$ciphers = array_filter($ciphers, function($c){return stripos($c, "rc2")===FALSE;});
$ciphers = array_filter($ciphers, function($c){return stripos($c, "rc4")===FALSE;});
$ciphers = array_filter($ciphers, function($c){return stripos($c, "md5")===FALSE;});

$ciphers_aliases=array_filter($cipher_aliases, function($c){return stripos($c, "des")===FALSE;});
$ciphers_aliases=array_filter($cipher_aliases, function($c){return stripos($c, "rc2")===FALSE;});
print_r($ciphers);
print_r($cipher_aliases);
 ?>

<?php //Пример #1 Пример использования openssl_get_curve_names()
$curve_names = openssl_get_get_curves_names();
print_r($curve_names);
 ?>

<?php //Пример #1 Пример использования openssl_get_md_methods()
$digests = openssl_get_md_methods();
$digests_and_aliases = openssl_get_md_methods(true);
$digest_aliases = array_diff($digests_and_aliases, $digests);

print_r($digests);
print_r($digest_aliases);
 ?>


<?php //Пример #1 Пример использования openssl_open()
$fp = fopen("/src/openssl-0.9.6/demos/sign/key.pem", "r");
$priv_key = fread($fp, 8192);
fclose($fp);
$pkeyid = openssl_get_privatekey($priv_key);

if(openssl_open(sealed, $open, $env_key, $pkeyid)){
    echo "Расшифрованные данные: ", $open;
    } else {
        echo "Что-то пошло не так :(";
    }

    openssl_free_key($pkeyid);
 ?>


<?php //Пример #1 Пример использования openssl_pbkdf2()
$password = 'yOuR-pAs5w0rd-hERe';
$salt = openssl_random_pseudo_bytes(12);
$keyLength = 40;
$iterations = 10000;
$generated_key = openssl_pbkdf2($password, $salt, $keyLenth, $iterations, 'sha256');
echo bin2hex($generated_key).;
echo base64_encode($generated_key).;
 ?>

<?php //Пример #1 Пример использования openssl_pkcs12_read()
if (!$cert_store = file_get_contents("/certs/file.p12")){
    echo "Ошибка: невозможно прочитать файл сертификата";
    exit;
}
if (openssl_pkcs12_read($cert_store, $cert_info, " my_secret_pass")){
    echo " Информация об сертификате";
    print_r($cert_info);
} else {
    echo " Ошибка: невозсожно прочитать хранилице сертификата";
    exit;
}
 ?>

<?php //Пример #1 Пример использования openssl_pkcs7_decrypt()
$infilename = "encrypt.msg";
$outfilename = "decrypted.msg";

if (openssl_pkcs7_decrypt($infilename, $outfilename, $cert, $key)){
echo "Расшифровано";
} else {
    echo "возникла ошибка при расшифровке";
}
 ?>

<?php //Пример #1 Пример использования openssl_pkcs7_encrypt()
$data = <<<
Козодой,

Совершенно секретно! После прочтения сжечь!

Враги приближаются! Связной с новым поддельным паспортом
будет ждать тебя завтра в кафе в 8.30 утра.

Пароль - "У вас ус отклеился!"
Отзыв - "Это не ус, а борода!"

EOD;

$key = file_get_contents("nighthawk.pem");

$fp = fopen("msg.txt", "w");
fwrite($fp, $data);
fclose($fp);

of (openssl_pkcs7_ecrypt("msg.txt", "enc.txt", $key,
array("To" => "nighthawk@example.com", // ассоциативный синтаксис
          "From: HQ <hq@example.com>", // индексированный синтаксис
          "Subject" => "СРОЧНО!!! ВАЖНО!!!"))){
exec(ini_get("sendmail_path"). " < enc.txt");
          }
 ?>

<?php //Пример #1 Get a PEM array from a P7B file
$file = 'certs.p7b';

$f = file_get_contents($file);
$p7 = array();
$r = openssl_pkcs7_read($f, $p7);

if($r === false){
    printf("ОШИБКА: %s не является корректным файлом p7b".PHP_EOL, $file);
    for ($e = openssl_error_string(), $i = 0; $e; $e = openssl_error_string(), $i++)
        printf("SSL l%d: %s". PHP_EOL, $i, $e);
    exit(1);
} 
print_r($p7);
?>

<?php //Пример #1 Пример использования openssl_pkcs7_sign()
$data = <<<EOD

Разрешаю потратить на обед с контрагентом не более 100,000 рублей.

Ваш директор.
EOD;

$fp = fopen("msg.txt", "w");
fwrite($fp, $data);
fclose($fp);

if (openssl_pkcs7_sign("msg.txt", "sighned.txt", "file://mycert.pem",
array("file://mycert.pem", "mypassphrase"),
array("To" => "joes@example.com", // ассоциативный синтаксис
          "From: HQ <ceo@example.com>", // индексированный синтаксис
          "Subject" => "Представительские расходы")))
{
    exec(ini_get("sendmail_path"). "< signed.txt");
}
 ?>

<?php //Пример #1 Получить открытую часть ключа из закрытого ключа
$private_key = openssl_pkey_new();
$public_key_pem = openssl_pkey_get_details($private_key)['key'];
echo $public_key_pem;
$public_key = openssl_pkey_get_public($public_key_pem);
var_dump($public_key);
 ?>

<?php //Пример #1 Пример использования openssl_random_pseudo_bytes()
for($i = 1; $i<=4; $i++){
$bytes = openssl_random_pseudo_bytes($i, $cstrong);
$hex = bin2hex($bytes);

echo "Lengths: Bytes: $i and Hex: ". strlen($hex). PHP_EOL;
var_dump($hex);
var_dump($cstrong);
echo PHP_EOL;
}
 ?>


<?php //Пример #1 Пример использования openssl_seal()
$fp=fopen("/src/openssl-0.9.6/demos/maurice/cert.pem", "r");
$cert = fread($fp, 8192);
fclose($fp);
$pk1 = openssl_get_publickey($cert);

$method = 'AES256';

$ivLength = openssl_cipher_iv_length($method);
$iv = openssl_random_pseudo_bytes($ivLength, $strong);
if (!$strong){
    error_log('Инициилизирующий вектор может быть не криптографически сильным');
}
openssl_seal($data, $sealed, $ekeys, array($pk1, $pk2), $method, $iv);

openssl_free_key($pk1);
openssl_free_key($pk2);
?>


<?php //Пример #1 Пример использования openssl_sign()
$pkeyid = openssl_pkey_get_private("file://src/openssl-0.9.6/demos/sign/key.pem");
openssl_sign($data, $signature, $pkeyid);

openssl_free_key($pkeyid);
 ?>

<?php //Пример #2 Пример использования openssl_sign()
$data = 'my data';

$new_key_pair = openssl_pkey_new(array(
"private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,));
    openssl_pkey_export($new_key_pair, $private_key_pem);

    $details = openssl_pkey_get_details($new_key_pair);
    public_key_pem = $details['key'];

    openssl_pkey_export($new_key_pair, $private_key_pem);

$details = openssl_pkey_get_details($new_key_pair);
$public_key_pem = $details[''];
open_sign($data, $signature, $private_key_pem, OPENSSL_ALGO_Sha256);

file_put_contents('private_key.pem', $private_key_pem);
file_put_contents('public_key.pem', $public_key_pem);
file_put_contents('signature.dat', $signature);

$r = openssl_verify($data, $signature, $public_key_pem, "sha256WithRSAEncryption");
var_dump($r);
 ?>


<?php //Пример #1 Пример использования openssl_spki_export_challenge()
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');
$challenge = openssl_spki_export_challenge(preg_replace('/SPKAC=/', '', $spkac));
 ?>


<?php //Пример #2 Пример использование openssl_spki_export_challenge() с <keygen>
$challenge = openssl_spki_export_challenge(preg_replace('/SPKAC=/', '', $_POST['spkac']));
 ?>
<keygen name="spkac" challenge="challenge string" keytype="RSA"> 


<?php //Пример #1 Пример использования openssl_spki_export()
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');
$pubKey = openssl_spki_export(preg_replace('/SPKAC=/', '', $spkac));

if ($pubKey){
    echo $pubKey;
}
 ?>

<?php //Пример #2 Пример использования openssl_spki_export() с <keygen>
$spkac = openssl_spki_export(preg_replace('/SPKAC=/', '', $_POST['spkac']));
if ($spkac !=Null){
    echo $spkac;
} else {
    echo "Не удалось извлечь отурытый ключ";
}
?>
?>
<keygen name="spkac" challenge="challenge string" keytype="RSA"> 


<?php //Пример #1 Пример использования openssl_spki_new()
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'testing');

if ($spkac != NULL){
    echo $spkac; 
} else {
    echo "Генерация SPKAC не удалась";
}
?>


<?php //Пример #1 Пример использования openssl_spki_verify()
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');

if (openssl_spki_verify(preg_replace('/SPKAC=/', '', $spkac))){
    echo $spkac;
} else {
    echo "Проверка SPKAC не удалась";
}
?>

<?php //Пример #2 Пример использования openssl_spki_verify() с <keygen>
if (openssl_spki_verufy(preg_replace('/SPKAC=/', '', $_POST['spkac']))){
    echo $spkac;
} else {
    echo "Проверка не удалась";
} 
?>
<keygen name="spkac" challenge="challenge string" keytype="RSA"> 

<?php //Пример #1 Пример использования openssl_verify()
$pubkeyid = openssl_pkey_get_public("file://src/openssl-0.9.6/demos/sign/cert.pem");

$ok = openssl_verify($data, $signature, $pubkeyid);
if($ok==1){
    echo "подпись корректная";
} elseif ($ok == 0) {
    echo "Подпись некорректная";
}    

openssl_free_key($pubkeyid);
 ?>


<?php //Пример #2 Пример использования openssl_verify()
$data ='my data';

$private_key_res = openssl_pkey_new(array(
    "private_key_bits"=>2048,
    "private_key_type"=>OPENSSL_KEYTYPE_RSA,
));
$details=openssl_pkey_get_details($private_key_res);
$public_key_res = openssl_pkey_get_public($details['key']);

openssl_sign($data, $signature, $public_key_res, OPENSSL_ALGO_SHA256);
if($ok == 1){
    echo "корректна";
}  elseif ($ok == 0){
    echo "некорректна";
}  else {
    echo " ошибка: ". openssl_error_string();
}    
 ?>


<?php //Пример #1 Пример использования openssl_x509_verify() 
$hostname = "news.php.net";
$ssloptions = array("capture_peer_cert" => true,
    "capture_peer_cert_chain" => true,
    "allow_self_signed"=> false,
    "CN_match" => $hostname,
    "verify_peer" => true,
    "SNI_enabled" => true,
    "SNI_server_name" => $hostname,);

$ctx = stream_context_create(array("ssl"=>$ssloptions));
$result = stream_socket_client(array("ssl://$hostname:443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $ctx);
    $cont = stream_context_get_params($result)
);
$x509 = $cont["options"]["ssl"]["peer_certificate"];
$certparsed = openssl_x508_parse($x509);

foreach($cont["options"]["ssl"][peer_certificate_chain] as $chainsert){
    $chainparsed = openssl_x509_parse($chaincert);
    $chain_public_key = openssl_get_publickkey($chaincert);
    $r = openssl_x509_verify($x509, $chain_public_key);
    if ($r==1){
        echo $certparsed['subject']['CN'];
        echo "was digitally signed by";
        echo $chainparsed['subject']['CN']."\n";
    }
}
 ?>




<!-- https://www.php.net/manual/ru/function.openssl-cipher-iv-length.php -->
       </body> 
        </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
