<?


session_start();


if(!isset($_SESSION["yonetici"]))
 {
   	header('Location:admin.php');
 }
 
  //aşağısı yapılacak islem icin

if(isset($_POST['eklebutton']))
{
	$islem="ekle";
}
elseif(isset($_POST['silbutton']))
{
	$islem="sil";
}
elseif(isset($_POST['guncellebutton']))
{
	$islem="guncelle";
}

// şimdi de hangi kaydı seçtiğini bulalım

$tablo=$_GET['tbl'];

if($tablo=="admin")
{

	//adminden $adiadmin i aldık 

     if(isset($_POST['onayadmin']))
     {
     	$adminonay=$_POST['onayadmin'];
     	foreach($adminonay as $araadmin)
     	{
        
          $adiadmin= $araadmin;
        }
     }

   if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl=admin&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&adminadi='.$adiadmin.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&adminadi='.$adiadmin.'');
   }


}
elseif($tablo=="contact")
{

	//iki tane radiobutton koymustum bu onların değerini almak icin 

     if(isset($_POST['onaycontact']))
     {
     	$contactonay=$_POST['onaycontact'];
     	foreach($contactonay as $aracont)
     	 {
        
            $contactname=$aracont;
         }
     }

     if(isset($_POST['onaycontact1']))
     {
     	$contactonay1=$_POST['onaycontact1'];
     	foreach($contactonay1 as $aracont1)
     	 {
        
            $contacttarih=$aracont1;
         }
     }
   
   //simdi islem secme kısmı

    if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl=contact&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&contadi='.$contactname.'&conttarih='.$contacttarih.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&contactadi='.$contactname.'&conttarih='.$contacttarih.'');
   }


}
elseif($tablo=="gramer" || $tablo=="reading" || $tablo=="listening" || $tablo=="vocabulary")
{
	//idseviyeyi almak icin

      if(isset($_POST['onaybolum']))
     {
     	$bolumonay=$_POST['onaybolum'];
     	foreach($bolumonay as $arabolum)
     	 {
        
            $bolumseviye=$arabolum;
         
         }
     }
   
   //idkategoriyi almak icin
    if(isset($_POST['onaybolum1']))
     {
     	$bolumonay1=$_POST['onaybolum1'];
     	foreach($bolumonay1 as $arabolum1)
     	 {
        
            $bolumtopic=$arabolum1;
          
         }
     }

     //işlemler icin
   if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl='.$tablo.'&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&seviye='.$bolumseviye.'&kategori='.$bolumtopic.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&seviye='.$bolumseviye.'&kategori='.$bolumtopic.'');
   }


}
elseif($tablo=="levels")
{

	//level id si icin

    if(isset($_POST['onaylevels']))
     {
     	$levelonay=$_POST['onaylevels'];
     	foreach($levelonay as $aralevel)
     	 {
        
            $levelsid=$aralevel;
          
         }
     }



   if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl=levels&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&idlevel='.$levelsid.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&idlevel='.$levelsid.'');
   }





}
elseif($tablo=="user")
{

    //user id si icin

    if(isset($_POST['onayuser']))
     {
     	$useronay=$_POST['onayuser'];
     	foreach($useronay as $arauser)
     	 {
        
            $userid=$arauser;
          
         }
     }

     //işlemler icin

   if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl=user&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&iduser='.$userid.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&iduser='.$userid.'');
   }



}

elseif($tablo=="visitor")
{
     //visitor id si icin
     
    if(isset($_POST['onayvisitor']))
     {
     	$visitoronay=$_POST['onayvisitor'];
     	foreach($visitoronay as $aravisitor)
     	 {
        
            $visitorid=$aravisitor;
          
         }
     }
    
    //işlemler icin

   if($islem=="ekle")
   {
	header('Location:ekleallof.php?tbl=visitor&islem=ekle');
   }
   elseif($islem=="sil")
   {
   	header('Location:deleteallof.php?tbl='.$tablo.'&idvisitor='.$visitorid.'');
   }
   elseif($islem=="guncelle")
   {
   	header('Location:updateallof.php?tbl='.$tablo.'&idvisitor='.$visitorid.'');
   }

}





?>

