<?

include("baglanti.php");
session_start();


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
				<li class="selected">
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
		<div>
			<div class="featured">
				<img src="images/ort.jpg" alt="">
				<div>
					<div>
						<h3>LETS JOIN US!</h3>
						<p>
							If you learn English , If you go abroad with very beautiful English, 
							If you want to have beautiful language <br>
							If you say that It is beautiful but I dont know it. 
							Join us .
						</p>
						<a href="createaccount.php">SIGN UP NOW!</a>
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