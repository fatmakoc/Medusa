<?
include("../baglanti.php");


$tablo=@$_GET["tbl"];  //getle gonderilen tabloyu aldım ona göre label inputlar oluşturacağım
$tarih = date("d.m.Y");



if(isset($_POST["guncellebutton"]))  //eğer guncelle tusuna bastıysa :
{
   if(($tablo=$_GET["tbl"])=="admin")
   {
   	  $adiadmin=$_POST["aname"];
   	  $adparola=md5($_POST["asifre"]);

   	  $guncel_sorgu=@mysql_query("UPDATE admin SET password_admin='$adparola' where name_admin='$adiadmin'");

   	  header('Location:adminicerik.php?tbl=admin');
   }

   elseif(($tablo=$_GET["tbl"])=="contact")
   {
     $contadi=$_POST["cname"];
     $conttt=$_POST["ctrh"];
     $cmail=$_POST["cemail"];
     $cicerik=$_POST["cmessage"];
     $subject= $_POST["cbaslik"];

      $guncel_sorgu=@mysql_query("UPDATE contact SET email_contact='$cmail',subject_contact='$subject',message_contact='$cicerik' 
      	where name_contact='$contadi' and date_contact='$conttt'");

   	  header('Location:adminicerik.php?tbl=contact');
   }  
   
   elseif(($tablo=$_GET["tbl"])=="gramer" || ($tablo=$_GET["tbl"])=="reading" || ($tablo=$_GET["tbl"])=="listening" || ($tablo=$_GET["tbl"])=="vocabulary")
   {
      $sseviye=intval($_POST["bolumseviyeid"]);
      $kkategori=intval($_POST["kategoriid"]);
      $bad=$_POST["bolumname"];
      $bdetay=$_POST["bolumdetail"];

      $guncel_sorgu=@mysql_query("UPDATE $tablo SET name='$bad',details='$bdetay' where idseviye=$sseviye and 
      	idtopic=$kkategori");

   	  header('Location:adminicerik.php?tbl='.$tablo.'');	
   }

   elseif(($tablo=$_GET["tbl"])=="levels" )
   {
      $llid=intval($_POST["seviyeid"]);
      $lad=$_POST["levelname"];

       $guncel_sorgu=@mysql_query("UPDATE levels SET name_levels='$lad' where id_levels=$llid");

   	  header('Location:adminicerik.php?tbl=levels');	
   }

   elseif(($tablo=$_GET["tbl"])=="user" )
   {
   	  $uidd=intval($_POST["userid"]);
      $uadi=$_POST["username"];
      $usifre=md5($_POST["sifreuser"]);
      $umail=$_POST["mailuser"];
      $ucinsiyet=$_POST["gender"];
      $uposition=$_POST["positionuser"];
      $usehir=$_POST["cityuser"];
      $ubirth=$_POST["birthuser"];
      $uyas=intval($_POST["ageuser"]);
      $utelefon=$_POST["teluser"];

      $guncel_sorgu=@mysql_query("UPDATE user SET name_user='$uadi',password_user='$usifre',email_user='$umail',
          cinsiyet_user='$ucinsiyet',position_user='$uposition',city_user='$usehir',
            dtarihi_user='$ubirth',age_user=$uyas,telno_user='$utelefon'
            where id_user=$uidd");

   	  header('Location:adminicerik.php?tbl=user');	
   }

   elseif(($tablo=$_GET["tbl"])=="visitor" )
   {
      $visitorid=intval($_POST["idvisitor"]);
      $vmes=$_POST["messagevisitor"];

      $guncel_sorgu=@mysql_query("UPDATE visitor SET message_visitor='$vmes' where id_visitor=$visitorid");

   	  header('Location:adminicerik.php?tbl=visitor');	
   }
   
   //button post ifi sonu

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
					<a href="adminicerik.php?tbl=admin"><span>İ</span>şlemler</a>
				</li>
				<li >
					<a href="adminlogout.php"><span>L</span>og Out</a>
				</li>
			
			</ul>
		</div>
	</div>
	<div class="body">
		<div class="applications">
			<div>
				<div>
					<div class="application">
						<h2>UPDATE ITEM </h2>
                       <?
                           
                            if(($tablo=$_GET["tbl"])=="admin" && $aaaa=@$_GET["adminadi"])
                            {
	                          
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								    $sorgu=@mysql_query("SELECT * FROM admin where name_admin='$aaaa'");
                               while($ss=mysql_fetch_array($sorgu))
                               {
                               	extract($ss);
								  echo	'<tr>
										<td><label>Admin Name:</label></td>
										<td><input type="text"  name="aname" value="'.$name_admin.'"></td>
									</tr>
									<tr>
										<td><label>Password:</label></td>
										<td><input type="password" name="asifre" value="'.$password_admin.'"></td>
									</tr>'; 
								}
								echo '</table>
							</div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                               
                           }
                           
                            elseif(($tablo=$_GET["tbl"])=="contact") 
                            { 
	                         $c=@$_GET["contactadi"];
	                         $c1=@$_GET["conttarih"];
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								 $sorgu=@mysql_query("SELECT * FROM contact where name_contact='$c' and date_contact='$c1'");
                                 while($ss=mysql_fetch_array($sorgu))
                                 {
                               	     extract($ss);
									echo '<tr>
										<td><label> Name:</label></td>
										<td><input type="text"  name="cname" value="'.$name_contact.'"></td>
									</tr>
									<tr>
										<td><label>Email:</label></td>
										<td><input type="text" name="cemail" value="'.$email_contact.'"></td>
									</tr>
									<tr>
										<td><label>Konu Başlığı:</label></td>
										<td><input type="text" name="cbaslik" value="'.$subject_contact.'"></td>
									</tr>
									<tr>
										<td><label>Message:</label></td>
										<td><input type="text" name="cmessage" value="'.$message_contact.'"></td>
									</tr>
									<tr>
										<td><label>Date:</label></td>
										<td><input type="text" name="ctrh" value="'.$date_contact.'"></td>
									</tr>';
								}
								echo '</table>
							</div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                            }  
                         

                            elseif(($tablo=$_GET["tbl"])=="gramer" || ($tablo=$_GET["tbl"])=="reading" || ($tablo=$_GET["tbl"])=="listening" || ($tablo=$_GET["tbl"])=="vocabulary") 
                            {
                                $b=@intval($_GET["seviye"]);
                            	$b1=@intval($_GET["kategori"]) ;                         
	                            

                             echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								 $sorgu=@mysql_query("SELECT * FROM $tablo where idseviye=$b and idtopic=$b1");
                                 while($ss=mysql_fetch_array($sorgu))
                                 {
                               	     extract($ss);
									echo '
									<tr>
										<td><label> Level ID:</label></td>
										<td><input type="text"  name="bolumseviyeid" value="'.$idseviye.'"></td>
									</tr>
									<tr>
										<td><label>Kategori ID:</label></td>
										<td><input type="text" name="kategoriid" value="'.$idtopic.'"></td>
									</tr>
									<tr>
										<td><label>Name:</label></td>
										<td><input type="text" name="bolumname" value="'.$name.'"></td>
									</tr>
									<tr>
										<td><label>Details:</label></td>
										<td><input type="text" name="bolumdetail" value="'.$details.'"></td>
									</tr>';
								}

								echo '</table>
							</div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                            }  

                            elseif(($tablo=$_GET["tbl"])=="levels"  && $l=@intval($_GET["idlevel"]))
                            {
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								 $sorgu=@mysql_query("SELECT * FROM levels where id_levels=$l");
                                 while($ss=mysql_fetch_array($sorgu))
                                 {
                               	     extract($ss);
									echo '
									<tr>
										<td><label> Level ID:</label></td>
										<td><input type="text"  name="seviyeid" value="'.$id_levels.'"></td>
									</tr>
									<tr>
										<td><label>Level Name:</label></td>
										<td><input type="text" name="levelname" value="'.$name_levels.'"></td>
									</tr>';
								}
								echo '</table>
							</div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                            } 

                            elseif(($tablo=$_GET["tbl"])=="user" && $u=@intval($_GET["iduser"]))
                            {
                              echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								 $sorgu=@mysql_query("SELECT * FROM user where id_user=$u");
                                 while($ss=mysql_fetch_array($sorgu))
                                 {
                               	     extract($ss);
									echo '
								    <tr>
										<td><label> User ID:</label></td>
										<td><input type="text"  name="userid" value="'.$id_user.'"></td>
									</tr>
									<tr>
										<td><label> User Name:</label></td>
										<td><input type="text"  name="username" value="'.$name_user.'"></td>
									</tr>
									<tr>
										<td><label>User E-mail:</label></td>
										<td><input type="text" name="mailuser" value="'.$email_user.'"></td>
									</tr>
									<tr>
										<td><label>Gender:</label></td>
										<td><input type="text" name="gender" value="'.$cinsiyet_user.'"></td>
										
									</tr>
								
									
								</table>
							</div>
							<div>
                            <table>
                                <tr>
										<td><label>User Position:</label></td>
										<td><input type="text" name="positionuser" value="'.$position_user.'"></td>
									</tr>
									<tr>
										<td><label>City:</label></td>
										<td><input type="text" name="cityuser" value="'.$city_user.'"></td>
									</tr>
									<tr>
										<td><label>Birthday:</label></td>
										<td><input type="text" name="birthuser" value="'.$dtarihi_user.'"></td>
									</tr>
									<tr>
										<td><label>Age:</label></td>
										<td><input type="text" name="ageuser" value="'.$age_user.'"></td>
									</tr>
									<tr>
										<td><label>Tel Number:</label></td>
										<td><input type="text" name="teluser" value="'.$telno_user.'"></td>
									</tr>';
								}
                            echo '</table>
                            </div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                            } 

                             elseif(($tablo=$_GET["tbl"])=="visitor" && $v=@intval($_GET["idvisitor"]))
                             {
	                            
                                echo '
                                    <form action="" method="post">
							    <div>
								<table>';
								 $sorgu=@mysql_query("SELECT * FROM visitor where id_visitor=$v");
                                 while($ss=mysql_fetch_array($sorgu))
                                 {
                               	     extract($ss);
									echo '
								   <tr>
										<td><label> Visitor ID:</label></td>
										<td><input type="text"  name="idvisitor" value="'.$id_visitor.'"></td>
									</tr>
									<tr>
										<td><label> Message:</label></td>
										<td><input type="text"  name="messagevisitor" value="'.$message_visitor.'"></td>
									</tr>';
                                 }
							echo '</table>
							</div>
							<input type="submit" value="UPDATE" id="application-submit" name="guncellebutton">
                            </form>';
                            } 

                       ?>
						
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