<?

  include("baglanti.php");
  session_start();
  

    if(isset($_POST['gonder'])) 
     {
        $yorum=$_POST['comme'];
	    $tarih = date("d.m.Y");
    
        //yorumu göndermeyi deniyorum 

	    $deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') "); 	
     }  

    //eğer kullanıcı girişi yoksa bu sayfayı göremesin
    
    if(!isset($_SESSION["kullanic"]))
    {
    	header('Location:signin.php');
    }

   

?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Medusa İle İngiliççe</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li>
					<a href="ortak.php?Tadi=gramer" ><span>G</span>ramer</a>
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
		<div>
			<div>
				<div>
					<div class="programs">
						<h2>CHOOSE CATEGORY FROM MENU </h2>
						<div class="first">
							<ul>
								<li >
									<a >Daha Hızlı Öğrenme</a>
								</li>
								<li>
									<a >Kaliteli Öğrenim Anlayışı</a>
								</li>
								<li>
									<a >Daha Fazla Etkinlik</a>
								</li>
								<li>
									<a >Eğlenerek Öğrenme</a>
								</li>
								<li>
									<a >Öğrenme Garantili</a>
								</li>
							</ul>
						</div>
						<div>
							<h3>Her Seviye İçin Eğitim Materyallerimiz Var</h3>
							<p>
								Bu seviye çok düşük bana hitap etmiyor diyorsan bir sonraki seviyeye geç <br>
								Burası özel sayfan <br>
								Şimdi Menülerden istediğini seçerek öğrenmeye başla <br>
							</p>
							<h3>Nasıl Başlamalısın?</h3>
							<p>
								Gramerin eksik ise bir alt seviyeden başlamanı tavsiye ederiz. Böylece daha fazla eksiğini göreceksin ve kapatacaksın.<br>
                                Sık sık alıştırmalar çöz ve kelime ezber.<br>
                                Unutma ingilizce konuşabilmek çok fazla kelime bilmekten geçer. <br>
                                Tabiki daha iyi anlayabilmek içinde bol bol Listening yapmalısın <br>

                                Good Lucky :))
							</p>
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