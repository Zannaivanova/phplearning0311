<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rar</title>    
</head>
<body>
<?php //Пример #1 Декомпрессия на лету
if (!array_key_exists("i", $_GET)||!is_numeric($_GET["i"]))
    die("Индекс не указан или не числовой");
$index = (int)$_GET["i"];

$arch = RarArchive::open("example.rar");
if($arch === FALSE)
    die ("невозможно открыть example.rar");

$entries = $arch->getEntries();
if($entries === FALSE)
die("невозможно получить записи");

if(!array_key_exists($index, $entries))
die("нет такого индекса: $index");

$orfilename = $entries[$index]->getName();

$filesize = $entries[$index]->getUnpackedSize();

$fp = $entries[$index]->getStream();
if ($fp === FALSE)
    die("невозсожно открыть файл с индексом $index внутри архива");

$arch->close();

function detectUserAgent(){
    if(!array_key_exists('HTTP_USER_AGENT', $_server))
        return "Other";

    $uas = $_SEREVER['HTTP_USER_AGENT'];
    if (preg_match("@Opera/@", $uas))
        return "Opera";
    if (preg_match("@Firefox/@", $uas))
        return "Firefox";
    if (preg_match("@Chrome/@", $uas))
        return "Chrome";
    if (preg_match("@MSIE([0-9.]+);@", $uas, $matches)){
        if(((float)$matches[1])>=7.0)
            return"IE";
    }
    return"Other";
        } 

$formatRFC2231 = 'Content-Desposition: attachment; filename*=UTF-8\'\'%s';
$formatDef = 'Content-Disposition: attachment; filename = "%s"';

switch(detectUserAgent()){
    case"Opera":
    case "Ferefox":
    $orfilename = rawurlencode($orfilename);
    $format = $formatRFC2231;
    break;

    case"IE":
    case"Chrome":
      $orfilename = rawurlencode($orfilename);
      $format = $formatDef;
      break;
    default:
      if (function_exists("iconv"))
$orfilename = 
@iconv("UTF-8", "ISO-8859-1//TRANSLIT", $orfilename);
$format = $formatDef;
}
header(sprintf($format, $orfilename));

$contentType="application/octet-stream";
header("Content-Type:$contentType");

header("Content-Transfer-Encoding:binary");

header("Content-Length:$filesize");

if($_SERVER['REQUEST_METHOD']=="HEAD")
    die();

while(!feof($fp)){
    $s = @fread(Fp, 8192);
    if ($s === false)
        break;

    echo $s;
}
        ?>
        
      

<?php //Пример #2 Пример извлечения перечня файлов и директорий из RAR-архива
$rar_file = rar_open('example.rar') or die ("невозможно открыть Rar архив");

$entries = rar_list($rar_file);

foreach($entries as $entry){
echo ''.$entry->getName().;
echo ''.$entry->getPackedSize().;
echo ''.$entry->getUnpackedSize().;

$entry->extract('/dir/extract/to/');
}
rar_close($rar_file);
 ?>  
        <!-- https://www.php.net/manual/ru/rar.examples.php -->
        </body> 
        </html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        "}
}
