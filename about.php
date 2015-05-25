<?
include("baglanti.php");

if(isset($_POST['gonder'])) {

    $yorum=$_POST['comme'];
	$tarih = date("d.m.Y");
    
     //yorumu göndermeyi deniyorum 

	$deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') ");	

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
					<a href="index.php"><span>H</span>ome</a>
				</li>
				<li class="selected">
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
		<div>
			<div>
				<div>
					<div class="about">
						<div>
							<h2>ABOUT FOREIGN LANGUAGE EDUCATION </h2>
							<div>
								<p>
								    If you say I understand but I can't speak , this website is true choice for you.<br>
								    There is a lot of grammer, reading, listening, vocabulary applications.<br>
								    You should do much exercises so that you can speak English very well. <br>
								    There is only English applications but We will load different languages applications.<br> 


								</p>
								<h3><span>What will we do now ? </h3>
								<p>
									Birçok uygulama <br>
									Hızlıca sitemize üye olursan işlemler daha hızlı gerçekleşir<br>
									Tabi hemen öğrenmek istiyorsan :)



								</p>
							</div>
						</div>
						<div>
							<div>
								<img src="images/dddd.jpg" alt="">
								<h3><span>B</span>e <span>P</span>art of <span>O</span>ur <span>C</span>ommunity</h3>
								<p>
									Farklılıklara rağmen bizi bir araya getiren tek dil denebilir :) <br>
									Artık iletişim kurmak, anlaşmak daha kolay.
								</p>

							</div>
							


							
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