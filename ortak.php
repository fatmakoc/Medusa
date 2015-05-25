<?

  include("baglanti.php");
  session_start();
  
     //yorum commit etme
    if(isset($_POST['gonder'])) 
     {
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
				<li >
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
		<div>
			<div>
				<div>
					<div class="programs">
						<h2>GRAMER</h2>
					
						<div class="first">
							<ul>
								
								<?
								 $tabloadi=@$_GET["Tadi"];
								 $seviye_cekme=@mysql_query("SELECT * FROM levels");
								 while($sseviye=@mysql_fetch_array($seviye_cekme))
								 {
                                    extract($sseviye);

                                    echo  '<li class="selected" >
									<a href="level.php?sid='.$id_levels.'&sadi='.$name_levels.'&tabload='.$tabloadi.'" >'.$name_levels.'</a> 
								</li>';
                                   
								 }
								 ?>
                             
							</ul>
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
                                 <p>'.$date_visitor.'</p>
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