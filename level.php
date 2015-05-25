
<?
  include("baglanti.php");
  session_start();
  
   if(isset($_POST['gonder'])) {

    $yorum=$_POST['comme'];
	$tarih = date("d.m.Y");
    
     //yorumu göndermeyi deniyorum 

	$deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') ");	

   }
    
    
  
   //KAYIT OLMA SORGUSU

   if(isset($_POST['kaydolbutton']))
   {
   $newname=$_POST['newusername'];
   $sifre=md5($_POST['newuserpasw']);
   $cinsiyet=$_POST['gender'];
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
    
      
      header('Location:signin.php');
   }
   else 
      {	
    	
      } 
   }
   ////////////////////


?>



<html>
<head>
	<meta charset="UTF-8">
	<title>Medussa İle İngiliççe</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="javascript/main.js"> </script>
	<!-- Include the core jQuery and jQuery UI -->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<!-- Include the core media player JavaScript. -->
<script type="text/javascript" src="osmplayer/bin/osmplayer.compressed.js"></script>

<!-- Include the DarkHive ThemeRoller jQuery UI theme. -->
<link rel="stylesheet" href="osmplayer/jquery-ui/dark-hive/jquery-ui.css">

<!-- Include the Default template CSS and JavaScript. -->
<link rel="stylesheet" href="osmplayer/templates/default/css/osmplayer_default.css">
<script type="text/javascript" src="osmplayer/templates/default/osmplayer.default.js"></script>
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li>
					<a href="ortak.php?Tadi=gramer"><span>G</span>ramer</a>
				</li>
				<li>
					<a href="ortak.php?Tadi=listening"><span>L</span>istening</a>
				</li>
				<li >
					<a href="ortak.php?Tadi=reading"><span>R</span>eading</a>
				</li>
				<li>
					<a href="ortak.php?Tadi=vocabulary"><span>V</span>ocab</a>
				</li>
				<li>
					<a href="signout.php"><span>S</span>ign Out</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="body">
		<div class="applications">
			<div>
				<div>
					<div class="application">
						<h2 style="color:red;"><?

                          if(@intval($_GET["kid"])!=null)
                          {

                             //eğer numaralara tıklamışssa içeriklerin başlıklarını başlık kısmına atıyor 

                            if($kid =@intval($_GET["kid"]) and $seviye =@intval($_GET["sid"]) and $LLevel = @$_GET["tabload"] ) 
                             {
                                  $kategoriadicin=@mysql_query("SELECT *  From ".$LLevel."  where idtopic='".$kid."' and idseviye='".$seviye."'");
                                  while($ss=@mysql_fetch_array($kategoriadicin))
                                  {
                                  	extract($ss);
                                     $kategadi=@$name;
                                 }
                                 echo "$kategadi";
                             }
                         }
                         //eğer sadece Beginner/Inter vs ye tıkladıysam onların adı başlıkta yazıyor 
                           else if($seadi=@$_GET["sadi"] and $seviye = @intval($_GET["sid"]))
                           {
                              $baslik=$seadi;
                              echo "$seadi";
                           }

						 ?></h2>
							<div >
								<ul class="KonuBasliklari">
								<?
								//Başlıkları getiriyorum
								  $seviye = @intval($_GET["sid"]);
								  $tablo=@$_GET["tabload"];

								   $sorgu=@mysql_query("SELECT * FROM ".$tablo." where idseviye='".$seviye."'");
								  while($kullansorgu=@mysql_fetch_array($sorgu))
								  {
								  	extract($kullansorgu);
								  	echo '<li class="selected"> <a href="level.php?sid='.$seviye.'&kid='.$idtopic.'&tabload='.$tablo.'" >'.$name.'</a> </li>';
								  }
                                  
                                   

								?>
								</ul>
							</div>
							<div>
								<h3>İÇERİK</h3>

							<?
							//tıklanana ID ye göre içeriği getiriyoruz
							$kid = @intval($_GET["kid"]);
                            if($tablo=="listening")
                            {
                            	$bilgi_Cek=@mysql_query("SELECT * FROM ".$tablo." where idtopic='".$kid."' and idseviye='".$seviye."'");
							    while($bilgi=@mysql_fetch_array($bilgi_Cek))
							    {
								extract($bilgi);
								echo '<audio controls >
                                           <source src="listening/Elementary/'.$details.'" type="audio/mpeg">
                                   
								</audio>';

							    }
                            }
                            
                            if($tablo=="gramer" || $tablo=="reading" || $tablo=="vocabulary")
                            {
                            	//eğer tablo listening değilse player çıkmasın diye bu if şartını ekledim. 

							    $bilgi_Cek=@mysql_query("SELECT * FROM ".$tablo." where idtopic='".$kid."' and idseviye='".$seviye."'");
							    while($bilgi=@mysql_fetch_array($bilgi_Cek))
							    {
								extract($bilgi);
								echo ''.$details.'';

							    }
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