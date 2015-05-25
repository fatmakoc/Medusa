<?

   include("baglanti.php");
  session_start();
 

   //yorum ekleme sorgusu

   if(isset($_POST['gonder'])) {

    $yorum=$_POST['comme'];
	$tarih = date("d.m.Y");
    
     

	$deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') ");	

   }
   ///////////////////////////
   if(isset($_SESSION["kullanic"]))
    {
    	header('Location:personelpage.php');
    }

   
   /////////giriş sorgusu
   
   if(isset($_POST['gir']))
   {

   	$gir_m=strip_tags($_POST['mailadr1']);
   	$gir_sifre=$_POST['usersifre'];

   	$adicin=@mysql_query("SELECT * FROM user where email_user='".$gir_m."'");
   	$adiicin1=@mysql_fetch_array($adicin);
    $ad_kullanici=$adiicin1["name_user"];
    
    $kayit_sorgula1=@mysql_query("Select * from user where email_user='".$gir_m."' and password_user=md5('".$gir_sifre."')");
    $kayit_sayisi=@mysql_num_rows($kayit_sorgula1); 
    

    if($kayit_sayisi==1)
    {
        $_SESSION["kullanic"] = $ad_kullanici;
        $_SESSION["yetki"]="users";
       
       	header('Location:personelpage.php');
    	
    }

   }



?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Medusa İle İngiliççe</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script type="text/javascript" src="javascript/main.js"> </script>
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
				<li class="selected">
					<a href="signin.php"><span>S</span>ign In</a>
				</li>			
			</ul>		
		</div>
	</div>
	<div class="body">
		<div>
			<div class="featured">
				<img src="images/ort.jpg" alt="">
				<div>
					<div>
						<h3>SIGN IN QUICKLY </h3>
						<form action="" method="post">
							<table>
								<br>
								<tr>
									<td><label for="mailadre"><span>M</span>ail Adress:</label></td>
									<td><input type="text" id="adr1" name="mailadr1"></td>
								</tr>
								<br>
								<tr>
									<td><label for="password"><span>P</span>assword:</label></td>
									<td><input type="password" id="pasw" name="usersifre"></td>
								</tr>
							</table>
							<br>
							<input type="submit" value="Sign In" id="application-submit" name="gir" onclick="kullanici_sorgula('$yok')">
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
				<form action="" method="post">
					<input type="text" name="comme"> 
					<input type="submit" name="gonder" value="Send">
				</form>
			</div>
			<div>
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