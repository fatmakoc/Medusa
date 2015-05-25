<?
include("../baglanti.php");

//else if le hangi tablo geldiyse onun  sütünlarını ekle . createaccountun tasarımını al

$tablo=@$_GET["tbl"];  //getle gonderilen tabloyu aldım ona göre label inputlar oluşturacağım
$tarih = date("d.m.Y");

//ekleme sorgusu buraya gelsin




if(isset($_POST['eklebutton']))  //eğer ekle tusuna bastıysa :
{
   if($tablo=="admin")
   {
   	  $adname=$_POST["aname"];
   	  $adparola=md5($_POST["asifre"]);

   	  $kayit_sorgusu=@mysql_query("INSERT INTO admin (name_admin,password_admin)
   	                    VALUES ('$adname','$adparola') ");

   	  header('Location:adminicerik.php?tbl=admin');
   }

   elseif($tablo=="contact")
   {
     $cad=$_POST["cname"];
     $cmail=$_POST["cemail"];
     $cicerik=$_POST["cmessage"];
     $subject= $_POST["cbaslik"];

      $kayit_sorgusu=@mysql_query("INSERT INTO contact (name_contact,email_contact,subject_contact,message_contact,date_contact)
   	                    VALUES ('$cad','$cmail','$subject','$cicerik','$tarih') ");

   	  header('Location:adminicerik.php?tbl=contact');
   }  
   
   elseif($tablo=="gramer" || $tablo=="reading" || $tablo=="listening" || $tablo=="vocabulary")
   {
      $bseviye=intval($_POST["bolumseviyeid"]);
      $bkid=intval($_POST["kategoriid"]);
      $bad=$_POST["bolumname"];
      $bdetay=$_POST["bolumdetail"];

        $kayit_sorgusu=@mysql_query("INSERT INTO $tablo (idseviye,idtopic,name,details)
   	                    VALUES ('$bseviye','$bkid','$bad','$bdetay') ");

   	  header('Location:adminicerik.php?tbl='.$tablo.'');	
   }

   elseif($tablo=="levels" )
   {
      $lid=intval($_POST["seviyeid"]);
      $lad=$_POST["levelname"];

        $kayit_sorgusu=@mysql_query("INSERT INTO levels (id_levels,name_levels)
   	                    VALUES ('$lid','$lad') ");

   	  header('Location:adminicerik.php?tbl=levels');	
   }

   elseif($tablo=="user" )
   {
      $uadi=$_POST["username"];
      $usifre=md5($_POST["sifreuser"]);
      $umail=$_POST["mailuser"];
      $ucinsiyet=$_POST["gender"];
      $uposition=$_POST["positionuser"];
      $usehir=$_POST["cityuser"];
      $ubirth=$_POST["birthuser"];
      $uyas=intval($_POST["ageuser"]);
      $utelefon=$_POST["teluser"];

        $kayit_sorgusu=@mysql_query("INSERT INTO user (name_user,password_user,email_user,cinsiyet_user,
        	position_user,city_user,dtarihi_user,age_user,telno_user)
   	               VALUES ('$uadi','$usifre','$umail','$ucinsiyet','$uposition','$usehir','$ubirth','$uyas','$utelefon') ");

   	  header('Location:adminicerik.php?tbl=user');	
   }

   elseif($tablo=="visitor" )
   {
      
      $vmes=$_POST["messagevisitor"];

        $kayit_sorgusu=@mysql_query("INSERT INTO visitor (message_visitor,date_visitor)
   	                    VALUES ('$vmes','$tarih') ");

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
					<a href="adminicerik.php?tbl=admin"><span>H</span>ome</a>
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
						<h2>ADD A NEW ITEM </h2>
                       <?
                       $tablo=$_GET["tbl"];
                            if($tablo=="admin")
                            {

                             echo '
                                    <form action="" method="post">
							    <div>
								<table>
									<tr>
										<td><label>Admin Name:</label></td>
										<td><input type="text"  name="aname" ></td>
									</tr>
									<tr>
										<td><label>Password:</label></td>
										<td><input type="password" name="asifre"></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
                            </form>';
                            }

                            elseif($tablo=="contact")
                            { 
	                          
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>
									<tr>
										<td><label> Name:</label></td>
										<td><input type="text"  name="cname" ></td>
									</tr>
									<tr>
										<td><label>Email:</label></td>
										<td><input type="text" name="cemail"></td>
									</tr>
									<tr>
										<td><label>Konu Başlığı:</label></td>
										<td><input type="text" name="cbaslik"></td>
									</tr>
									<tr>
										<td><label>Message:</label></td>
										<td><input type="text" name="cmessage"></td>
									</tr>
									<tr>
										<td><label>Date:</label></td>
										<td><input type="text" name="ctrh" ></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
                            </form>';
                            }  
                            elseif($tablo=="gramer" || $tablo=="reading" || $tablo=="listening" || $tablo=="vocabulary")   	
                          {
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>
									<tr>
										<td><label> Level ID:</label></td>
										<td><input type="text"  name="bolumseviyeid" ></td>
									</tr>
									<tr>
										<td><label>Kategori ID:</label></td>
										<td><input type="text" name="kategoriid" ></td>
									</tr>
									<tr>
										<td><label>Name:</label></td>
										<td><input type="text" name="bolumname"></td>
									</tr>
									<tr>
										<td><label>Details:</label></td>
										<td><input type="text" name="bolumdetail"></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
                            </form>';
                            }  

                            elseif($tablo=="levels")
                            {
	                          
                             echo '
                                    <form action="" method="post">
							    <div>
								<table>
									<tr>
										<td><label> Level ID:</label></td>
										<td><input type="text"  name="seviyeid"></td>
									</tr>
									<tr>
										<td><label>Level Name:</label></td>
										<td><input type="text" name="levelname"></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
                            </form>';
                            } 

                            elseif($tablo=="user")
                            {
                             
                              echo '
                                    <form action="" method="post">
							    <div>
								<table>
								    
									<tr>
										<td><label> User Name:</label></td>
										<td><input type="text"  name="username"></td>
									</tr>
									<tr>
										<td><label>User Password:</label></td>
										<td><input type="text" name="sifreuser"></td>
									</tr>
									<tr>
										<td><label>User E-mail:</label></td>
										<td><input type="text" name="mailuser"></td>
									</tr>
									<tr>
									    <td><label>Gender:</label></td>
										<td><input type="text" name="gender"></td>
										
									</tr>
									
								</table>
							</div>
							<div>
                            <table>
                                <tr>
										<td><label>User Position:</label></td>
										<td><input type="text" name="positionuser"></td>
									</tr>
									<tr>
										<td><label>City:</label></td>
										<td><input type="text" name="cityuser"></td>
									</tr>
									<tr>
										<td><label>Birthday:</label></td>
										<td><input type="text" name="birthuser"></td>
									</tr>
									<tr>
										<td><label>Age:</label></td>
										<td><input type="text" name="ageuser"></td>
									</tr>
									<tr>
										<td><label>Tel Number:</label></td>
										<td><input type="text" name="teluser"></td>
									</tr>
                            </table>
                            </div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
                            </form>';
                            } 
                             elseif($tablo=="visitor")
                             {
	                            
                                echo '
                                    <form action="" method="post">
							    <div>
								<table> 
									<tr>
										<td><label> Message:</label></td>
										<td><input type="text"  name="messagevisitor"></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="ADD" id="application-submit" name="eklebutton">
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