<?
include("../baglanti.php");
session_start();


if(!isset($_SESSION["yonetici"]))
    {
    	header('Location:admin.php');
    }
 


?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Medusa İle İngiliççe</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div>
			<a href="../index.php" id="logo"><img src="../images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li class="selected">
					<a href="adminicerik.php?tbl=admin"><span>H</span>ome</a>
				</li>
				<li >
					<a href="adminlogout.php"><span>L</span>og Out</a>
				</li>
			
			</ul>
		</div>
	</div>
	<div class="body">
		<div>
			<div>
				<div>
					<div class="programs">
						<h2>İŞLEMLER</h2>
					
						<div class="first">
							<ul>
							   <li class="selected"> <a href="adminicerik.php?tbl=admin" > Admin </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=contact" > Contact </a> </li> 	
							   <li class="selected"> <a href="adminicerik.php?tbl=user" > Users </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=visitor" > Visitors </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=levels" > Levels </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=gramer" > Gramer </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=reading" > Reading </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=listening" > Listening </a> </li>
							   <li class="selected"> <a href="adminicerik.php?tbl=vocabulary" > Vocabulary </a> </li>

                             
							</ul>
						</div>
						<?
						$tablo=$_GET['tbl'];
						?>
						<div>
                              
                              <?
                              if($tablo=="admin")
                              {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                   echo '<form action="icerik2.php?tbl=admin " method="post">
                                        <table>
                                             <tr><td>Admin ADI</td> 
                                             </tr> ';
                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);
                                  
                                      echo '
                                     
                                             <tr><td><input type="checkbox" name="onayadmin[]" value="'.$name_admin.'"/> '.$name_admin.' </td>	
                                             </tr> ';
                                           
                                 }
                                 echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>  </form>';
                             }

                              elseif($tablo=="contact")
                              {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                  
                                  echo 
                                      '<form action="icerik2.php?tbl=contact" method="post">
                                        <table> <tr>
                                              <td> Kisi Adı </td> 
                                              <td>Emaili </td>  
                                              <td>Baslik </td>
                                              <td> Mesaj  </td>
                                              <td>Tarih  </td> </tr>';

                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);
                                  echo '
                                       <tr>
                                      <td> <input type="checkbox" name="onaycontact[]" value="'.$name_contact.'">'.$name_contact.'</td>
                                      <td> '.$email_contact.'  </td>	
                                      <td> '.$subject_contact.' </td> 
                                      <td>  '.$message_contact.' </td>
                                      <td> <input type="checkbox" name="onaycontact1[]" value="'.$date_contact.'">'.$date_contact.' </td> </tr>	';
                                           
                                 }
                                  echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>  </form>';
                             }
                             elseif($tablo=="gramer" || $tablo=="reading" || $tablo=="listening" || $tablo=="vocabulary")
                              {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                  
                                    echo 
                                      '  <form action="icerik2.php?tbl='.$tablo.'" method="post">
                                        <table><tr>
                                          <td>Seviye  </td>
                                          <td>  KategoriID  </td>
                                          <td>  Baslik </td></tr>';
                               
                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);
                                       echo '<tr>
                                             <td><input type="checkbox" name="onaybolum[]" value="'.$idseviye.'"/> '.$idseviye.' </td>
                                             <td><input type="checkbox" name="onaybolum1[]" value="'.$idtopic.'"/> '.$idtopic.' </td>
                                             <td> '.$name.' </td> 
                                             </tr>';
                                           
                                 }
                                   echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>   </form>';
                             }
                              elseif($tablo=="levels")
                               {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                  
                                    echo 
                                      ' <form action="icerik2.php?tbl=levels" method="post">
                                      <table><tr>
                                            <td>Seviye </td> 
                                            <td> Adı </td>
                                             </tr>  ';
                               
                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);
                                 
                                       echo '
                                             <tr>
                                             <td><input type="checkbox" name="onaylevels[]" value="'.$id_levels.'"/> '.$id_levels.' </td>
                                             <td> '.$name_levels.' </td></tr> ';
                                           
                                   }
                                    echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>  </form>';
                               }

                               elseif($tablo=="user")
                               {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                  
                                    echo 
                                      '  <form action="icerik2.php?tbl=user" method="post">
                                      <table><tr>
                                             <td>ID</td> 
                                             <td> Adı </td> 
                                             <td> Email </td>
                                              </tr>  ';
                               
                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);

                                      echo '
                                             <tr>
                                              <td><input type="checkbox" name="onayuser[]" value="'.$id_user.'"/> '.$id_user.' </td>
                                              <td> '.$name_user.' </td>
                                              <td> '.$email_user.' </td> </tr>';
                                           
                                           
                                   }
                                    echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>  </form>';
                               }

                                elseif($tablo=="visitor")
                               {
                                  $sorgu=@mysql_query("SELECT * FROM ".$tablo."");
                                  
                                    echo 
                                      ' <form action="icerik2.php?tbl=visitor" method="post"> 
                                      <table> <tr>
                                           <td>  ID  </td>
                                            <td> Mesaj </td> 
                                            <td> Tarih </td>
                                              </tr>  ';
                               
                                 while($sorgudizi=@mysql_fetch_array($sorgu))
                                 {

                                   extract($sorgudizi);
                                 
                                       echo '<tr>
                                            <td> <input type="checkbox" name="onayvisitor[]" value="'.$id_visitor.'"/> '.$id_visitor.'  </td>
                                              <td> '.$message_visitor.' </td>
                                              <td>'.$date_visitor.' </td></tr>';
                                           
                                   }
                                     echo '</table><br><br><input type="submit" value="Ekle" name="eklebutton"/> 
                                       <input type="submit" value="Sil" name="silbutton"/> 
                                       <input type="submit" value="Güncelle" name="guncellebutton"/>  </form>';
                               }
                              ?>
                           
						</div>
				
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>

		</div>
		<div>
			<p>
				Medusa Foreign Language &#169; 2015 | All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>