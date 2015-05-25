<?
    include("baglanti.php");
   
    

   

   if(isset($_POST['gonder'])) 
   {

    $yorum=$_POST['comme'];
	$tarih = date("d.m.Y");
    
     //yorumu göndermeyi deniyorum 

	$deger=@mysql_query( "INSERT INTO visitor (message_visitor,date_visitor) VALUES ('$yorum','$tarih') ");	

   }  



    //////////
     
    // mail gonderme kısmı aşağıda

     if(isset($_POST['mail_gond']))
     {
        // if($_POST['name']!=='' && $_POST['email']!=='' && $_POST['subject']!=='' && $_POST['message']!=='')  //boş olup olmadığı kontrolü
	         
            $kim=@$_POST['name'];
            $adres=@$_POST['email'];
            $baslik=@$_POST['subject'];
            $mesaj=@$_POST['message'];

            $ekle=@mysql_query("INSERT INTO contact(email_contact,name_contact,subject_contact,message_contact,date_contact) 
                          VALUES ('$adres','$kim','$baslik','$mesaj','$tarih') ");
            
       $kime='phpproje@yandex.com';




        mail($kime,$baslik,$mesaj,$adres);

              
             
   }    


?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Medusa İle İngiliççe</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="javascript/main.js"> </script>
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li>
					<a href="index.php"><span>H</span>ome</a>
				</li>
				<li>
					<a href="about.php"><span>A</span>bout</a>
				</li>
				<li class="selected">
					<a href="contact.php"><span>C</span>ontact</a>
				</li>
				<li>
					<a href="signin.php"><span>S</span>ign In</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="body">
		<div class="contact">
			<div>
				<div>
					<div class="contact">
						<h2>MEDUSA ENGLISH INFO</h2>
						<div class="address">
							<span><span>A</span>ddress:</span>
							<p>
								34798 Moda, Kadıkoy, Istanbul, Turkey
							</p>
							<span><span>P</span>hone <span>N</span>umber:</span>
							<p>
								0216-800-99-98 <br>
								0216-800-99-97
							</p>
							<span><span>F</span>ax <span>N</span>umber:</span>
							<p>
								0216-800-62-22
							</p>
						</div>
						<h3> If you want to send your opinion with message, fill in the blanks please </h3>
						<form action="" method="post">
							<table>
								<tr>
									<td><label ><span>N</span>ame:</label></td>
									<td><input type="text" name="name"></td>
								</tr>
								<tr>
									<td><label ><span>E</span>mail <span>A</span>ddress:</label></td>
									<td><input type="text" name="email"></td>
								</tr>
								<tr>
									<td><label ><span>S</span>ubject:</label></td>
									<td><input type="text" name="subject"></td>
								</tr>
								<tr>
									<td><label ><span>M</span>essage:</label></td>
									<td><textarea name="message"  cols="30" rows="10"></textarea></td>
								</tr>
							</table>
							<input type="Submit" value="Send" name="mail_gond">
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
