<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phar</title>    
</head>
<body>
<?php //Использование класса Phar 
try {
    $p = new Phar('coollibrary.phar', 0);

    foreach(new RecursiveIteratorIterator($p) as $file){
        echo $file->getFileName().;
        echo file_get_contents($file->getPathName()).
    }
    if (isset($p['internal/file.php'])){
        var_dump($p['internal/file.php']->getMetadata());
    }

    if (Phar::canWrite()){
        $p = new Phar('newphar.tar.phar', 0, 'newphar.tar.phar');

        $p=$p->convertToExecutable(Phar::TAR, Phar::GZ);
(new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/путь/к/проекту/project')), '/путь/к/проекту/');

$p['file1.txt']='Информация';
$fp = fopen('hugefile.dat', 'rb');

$p['data/hugefile.dat']=$fp;

if(Phar::canCompress(Phar::GZ)){

 $p['data/hugefile.dat']->compress(Phar::GZ);
}
$p['images/wow.jpg']=file_get_contents('images/wow.jpg');
$p['images/wow.jpg']->setMetadata(array('mime-type'=>'image/jpeg'));
$p['index.php']=file_get_contents('index.php');
$p->setMetadata(array('bootstart'=>'index.php'));

$p->stopBuffering();
}} catch (Exeption $e){
    echo 'Невозможно открыть Phar: ', $e;
}
?>


<?php //Использование Phar-архивов: обёртка потока phar 
$context = stream_context_create(array('phar'=> array('compresss'=> Phar::GZ)),
array('metadata'=> array('user'=>'cellog')));
file_put_contents('phar://my.phar/somefile.php', 0, $context);

 ?>

<!-- https://www.php.net/manual/ru/phar.using.intro.php -->
</body> 
</html>




























