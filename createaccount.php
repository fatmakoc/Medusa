<?

  include("baglanti.php");
  session_start();
  

   if(isset($_POST['gonder'])) {

    $yorum=$_POST['comme'];
	$tarih = date("d.m.Y");
    
     //yorumu göndermeyi deniyorum 

	$deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') ");	

   }
    
    if(isset($_SESSION["kullanic"]))
    {
    	header('Location:personelpage.php');
    }

  
   //KAYIT OLMA SORGUSU

   if(isset($_POST['kaydolbutton']))
   {
   $newname=$_POST['newusername'];
   $sifre=md5($_POST['newuserpasw']);
   $cinsiyet=$_POST['cinsiyet'];
   $posit=$_POST['position'];
   $sehir=$_POST['city'];
   $dtarihi=$_POST['dogumtar'];
   $yasi=$_POST['yas'];
   $telefon=$_POST['telno'];
   $m=$_POST['mailadres'];

   $kayit_sorgula=@mysql_query("Select * from user where email_user='".$m."'");
   
   $sayi=mysql_num_rows($kayit_sorgula);

   if($sayi==0)
   {
   	$kayit_sorgusu=@mysql_query( "INSERT INTO user (name_user,password_user,email_user,cinsiyet_user,position_user,city_user,dtarihi_user,age_user,telno_user)
   	                    VALUES ('$newname','$sifre','$m', '$cinsiyet', '$posit', '$sehir', '$dtarihi', '$yasi', '$telefon') ");
    
      echo 
      header('Location:signin.php');
   }
   else 
      {	
    	
      } 
   }
 


?>



<html>
<head>
	<meta charset="UTF-8">
	<title>Medussa İle İngiliççe</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li >
					<a href="index.php"><span>H</span>ome</a>
				</li>
				<li>
					<a href="about.php"><span>A</span>bout</a>
				</li>
				<li>
					<a href="contact.php"><span>C</span>ontact</a>
				</li>
				<li>
					<a href="signin.php"><span>S</span>ign In</a>
				</li>
			</ul>	
		</div>
	</div>
	<div class="body">
		<div class="applications">
			<div>
				<div>
					<div class="application">
						<h2>SIGN UP</h2>
						<form action="" method="post">
							<div>
								<table>
									<tr>
										<td><label for="name"><span>U</span>ser Name:</label></td>
										<td><input type="text" id="name" name="newusername"></td>
									</tr>
									<tr>
										<td><label for="sifre"><span>P</span>assword:</label></td>
										<td><input type="password" id="sifre" name="newuserpasw"></td>
									</tr>
									
									<tr>
										<td><label for="gender1"><span>G</span>ender:</label></td>
										<td><input type="text" name="cinsiyet" id="gender1"></td>
									</tr>
									<tr>
										<td><label for="position"><span>P</span>osition:</label></td>
										<td><input type="text" id="position" name="position"></td>
									</tr>
									<tr>
										<td><label for="address"><span>C</span>ity:</label></td>
										<td><textarea name="city" id="address" cols="30" rows="5" name="adres"></textarea></td>
									</tr>
								</table>
							</div>
							<div>
								<table>
									<tr>
										<td><label for="birthdate"><span>B</span>irthdate:</label></td>
										<td><input type="text" id="birthdate" name="dogumtar"></td>
									</tr>

									<tr>
										<td><label for="age"><span>A</span>ge:</label></td>
										<td><input type="text" id="age" name="yas"></td>
									</tr>
									<tr>
										<td><label for="phone-number"><span>P</span>hone <span>N</span>um.:</label></td>
										<td><input type="text" id="phone-number" name="telno"></td>
									</tr>
									<tr>
										<td><label for="email"><span>E</span>mail <span>A</span>dd:</label></td>
										<td><input type="text" id="email" name="mailadres"></td>
									</tr>
								</table>
							</div>
							<input type="submit" value="Sign Up" id="application-submit" name="kaydolbutton">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			<div>
				<h3> COMMENT</h3>
				<p>
					You can write your ideas so that We can develop this project
				</p>

				<form action="" method="post" >   
					<input type="text" name="comme"> 
					<input type="Submit" name="gonder" value="Send">
				</form>
            
			</div>



				<div class="comments">
				<h4>LAST COMMENTS</h4>
				 
				         <ul>
                     
                         <?
                           $yorumsorgu=mysql_query("SELECT * FROM visitor ORDER BY id_visitor DESC LIMIT 3");
                           while($sonuc=@mysql_fetch_array($yorumsorgu))
                           {
                             extract($sonuc);
                             echo ' <li>
                                 <p>"'.$message_visitor.'"</p> 
                                 <p>"'.$date_visitor.'"</p>
                            </li>';
                           }

                           ?>
                          </ul> 
				   
			</div>
		</div>
		<div>
			<p>
				Medusa Foreign Language &#169; 2015 | All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>