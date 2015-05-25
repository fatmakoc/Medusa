<?
include("../baglanti.php");

session_start();




//admin icin....//
if($tablo =@$_GET["tbl"] and $adiadmn =@$_GET["adminadi"])
{
	
	$sorgu=@mysql_query("DELETE FROM admin where name_admin=".$adiadmn."");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl=admin');
    

} 

//contact icin...//
elseif($tablo =@$_GET["tbl"] and $adicont =@$_GET["contadi"] and $tarihcont=@$_GET["conttarih"])
{
	
	$sorgu=@mysql_query("DELETE FROM contact where name_contact=".$adicont." and date_contact=".$tarihcont."");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl=contact');
    

} 
 
 //gramer,reading,vocab,listen iciin  ...///

  elseif($tablo =@$_GET["tbl"] and $seviyebolum =@intval($_GET["seviye"]) and $kategid=@intval($_GET["kategori"]))
  {
	
	$sorgu=@mysql_query("DELETE FROM $tablo where idseviye=$seviyebolum and idtopic=$kategid");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl='.$tablo.'');  
 } 

 /////levels tablosu icin

  elseif($tablo =@$_GET["tbl"] and $levelid=@intval($_GET["idlevel"]))
  {
	
	$sorgu=@mysql_query("DELETE  FROM levels where id_levels=".$levelid."");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl=levels');  
  } 
  
  ////user için

   elseif($tablo =@$_GET["tbl"] and $userid=@intval($_GET["iduser"]))
   {
	
	$sorgu=@mysql_query("DELETE  FROM user where id_user=".$userid."");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl=user');  
   } 
  
  ///visitor için....
   elseif($tablo =@$_GET["tbl"] and $visitorid=@intval($_GET["idvisitor"]))
   {
	
	$sorgu=@mysql_query("DELETE  FROM visitor where id_visitor=".$visitorid."");
	//burada bir js gelebilir alert ile silme islemi başarılı yonlendiriliyorsunuz şeklinde
	header('Location:adminicerik.php?tbl=visitor');  
  } 


?>

