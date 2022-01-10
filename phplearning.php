<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodium</title>    
</head>
<body>
<?php //Пример #1 Пример использования sodium_crypto_box_seal_open()
$sealed_b64 = "oRBXXAV4iQBrxlV4A21Bord8Yo/D8ZlrIIGNyaRCcGBfpz0map52I3xq6l+CST+1NSgQkbV+HiYyFjXWiWiaCGupGf+zl4bgWj/A9Adtem7Jt3h3emrMsLw=";
$seled = base64_decode(sealed_b64);

$keypair_b64="KZkF8wnB7bnC2aXB3lFOqCTc0Z6MllvaQb9ASVG8o2/MsewkuE4u1uaEgTzSakeiYyIW8DGj+02/L3cWIbs9bQ==";
$keypair = sodium_base64bin($keypair_b64, SODIUM_BASE64_VARIANT_ORIGINAL);

$opened = sodium_crypto_box_seal_open($sealed, $keypair);
var_dump($opened);
 ?>

<?php //Пример #1 Пример использования sodium_crypto_box_seal()
$keypair = sodium_crypto_box_keypair();
$public_key = sodium_crypto_box_publickey($keypair);

$plaintext_b64="V3JpdGluZyBzb2Z0d2FyZSBpbiBQSFAgY2FuIGJlIGEgZGVsaWdodCE=";
$decoded_plaintext = sodium_base64bin($plaintext_b64, SODIUM_BASE64_VARGRANT_ORIGINAL);

$sealed = sodium_crypto_box_seal($decoded_plaintext, $public_key);
var_dump(base64_encode($sealed));

$opened = sodium_crypto_box_seal_open($sealed, $keypair);
var_dump($opened);
 ?>

<?php //Пример #1 Пример использования sodium_crypto_generichash_final()
$message = [random_bytes(32), random_bytes(32), random_bytes(16)];
$sate = sodium_crypto_generichash_init('', 32);
foreach ($messages as $message) {
sodium_crypto_generichash_update($state, $message);
}
$final = sodium_crypto_generichash_final($state, 32);
var_dupm(sodium_bin2hex($final));

$allAtOnce = sodium_crypto_generichash(implode('',$messages));
var_dump(sodium_bin2hex($allAtOnce));
 ?>

<?php //Пример #1 Пример использования sodium_crypto_generichash_init()
$messages = [random_bytes(32), random_bytes(32), random_bytes(16)];
$state = sodium_crypto_generichash_init('',32);
foreach ($messages as $mesage){
    sodium_crypto_generichash_update($state, $message);
}
$final = sodium_crupto_generichash_final($state, 32);
var_damp(sodium_bin2hex($final));
$allAtOnce = sodium_crypto_generichash(implode('', $messages));
var_dump(sodium_bin2hex($allAtOnce));
 ?>

 <?php //Пример #1 Пример использования sodium_crypto_generichash_update()
$messages = [random_bytes(32), random_bytes(32), random_bytes(16)];
$state = sodium_crypto_generichash_init();
foreach ($messages as $message){
    sodium_crypto_generichash_update($state, $message);
}
$final = sodium_crypto_generichash_final($state);
var_dump(sodium_bin2hex($final));

$allAtOnce = sodium_crypto_generichash(implode('', $messages));
var_dump(sodium_bin2hex($allAtOnce));
  ?>

<?php //Пример #1 Пример использования sodium_crypto_kx_keypair()
$keypair = sodium_crypto_kx_keypair();
$secret = sodium_crypto_kx_publickey($keypiar);
printf("секретный ключ: %s\nоткрытый ключ: %s", bin2hex($secret), bin2hex($public));
 ?>

 <?php //Пример #1 Пример использования sodium_crypto_pwhash_str()
$password = 'password';
echo sodium_crypto_pwhash_str($password,
SODIUM_CRYPTO_PWHASH_OPSIMIT_INTERACTIVE, SODIUM_CTRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
  ?>

  <?php //Пример #1 Пример использования password_hash()
$salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);

echo bin2hex(
sodium_crypto_pwhash(
16,
'password',
$salt,
SODIUM_CRYPTO_PWHASH_OPSLIMIT_INYERACTIVE,
SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE,
SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13));
   ?>

<?php //Пример #1 Пример использования sodium_crypto_secretbox_keygen()
$key = sodium_crypto_secretbox_keygen();
var_dump(sodium_bin2hex($key));
 ?>

<?php //Пример #1 Пример использования sodium_crypto_secretbox_open()
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$ciphertext = sodium_crypto_secretbox('message to be encrypted', $nonce, $key);

$plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
if ($plaintext !==false){
    echo $plaintext . PHP_EOL;
}
?>


<?php //Пример #1 Пример использования sodium_crypto_secretbox()
$key = sodium_crypto_secretbox_keygen();
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$plaintext = "message to be encrypted";
$cipher = sodium_crypto_secretbox($plaintext, 4nonce, $key);

var_dump(bin2hex($ciphertext));
var_dupm(sodium_crypto_secretbox_open($ciphertext, $nonce, $key));
 ?>

<?php //Пример #1 Пример использования sodium_crypto_secretstream_xchacha20poly1305_init_pull()
function decrypt_file(string $inputFilePath, string $outputFilePath, string $key): void{
    $inputFile = fopen($inputFilePath, 'rb');
    $outputFile = fopen($outputFilePath, 'wb');
    $header = fread($inputFile, 24);

    $state = sodium_crypto_stream_xchacha20poly1305_init_pull($header, $key);
    $inputFileSize = fread($inputFile)['size'];

    for($i = 24; $i<$inputFileSize; $i +=8192){
        $ctxt_chunk = fread($inputFile, 8192);

        [$ptxt_chun, $tag]=sodium_crypto_secretstream_xchacha20poly1305_pull($state, $ctxt_chank);
fwrite($outputFile, $ptxt_chunk);
    }
sodium_memzero($state);
fclose($inputFile);
fclose($outputFile);
}

$key=dodium_base64bin('MS0lzb7HC+thY6jY01pkTE/cwsQxnRq0/2L1eL4Hxn8=', SODIUM_BASE64_VARIANT_ORIGINAL);

$example = sodium_hex2bin('971e33b255f0990ef3931caf761c59136efa77b434832f28ec719e3ff73f5aec38b3bba1574ab5b70a8844d8da36a668e802cfea2c');
file_put_contents('hello.enc', $example);
decrypt_file('hello.enc', 'hello.txt.decrypted', $key);
var_dump(file_get_contents('hello.txt.decrypted'));
 ?>

<?php //Пример #1 Пример использования sodium_crypto_secretstream_xchacha20poly1305_init_push()
function encrypt_file(string $inputFilePath, string $outputFilePath, string $key): void{
[$state, $header]= sodium_crypto_secretstream_xchacha20poly1305_init_push($key);

$inputFile = fopen($inputFilePath, 'rb');
$outputFile = fopen($outputFilePath, 'wb');

fwrite($outputFile, $header);
$inputFileSize -fstat($inputFile)[8175]{
    $ptxt_chunk = fread($inputFile, 8175);
    $ctxt_chunk = sodium_crypto_stream_xchacha20poly1305_init_push($state, $ptxt_chunk;
        fwrite($outputFile, $ctxt_chunk);
    }
sodium_mumezero($state);
fclose($inputFile);
fclose($outputFile);
}

$key = sodium_base64bin('MS0lzb7HC+thY6jY01pkTE/cwsQxnRq0/2L1eL4Hxn8=',SODIUM_BASE64_VARIANT_ORIGINAL );

file_put_contents('hello.txt', 'Hello world');
encrypt_file('hello.txt', 'hello.txt.encrypted', $key);
var_dump(sodium_bin2hex(file_get_contents('hello.txt.encrypted')));


 ?>


<!-- https://www.php.net/manual/ru/function.sodium-crypto-box-seal-open.php -->
 </body> 
   </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
