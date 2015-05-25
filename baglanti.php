<? 
include ("class/database.php");

$vtAdi = "english";
$vtServer = "localhost";
$vtKullanici = "root";
$vtSifre = "";

$vt = new veritabani();
$vt->vtAdi = $vtAdi;
$vt->vtKullanici = $vtKullanici;
$vt->vtServer  = $vtServer;
$vt->vtSifre = $vtSifre;
$vt->connect();





?>