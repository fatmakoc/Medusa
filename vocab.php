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
					<a href="ortak.php"><span>G</span>ramer</a>
				</li>
				<li>
					<a href="ortak.php"><span>L</span>istening</a>
				</li>
				<li >
					<a href="ortak.php"><span>R</span>eading</a>
				</li>
				<li class="selected">
					<a href="ortak.php"><span>V</span>ocab</a>
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
						<h2>CHOOSE ITEMS </h2>
						<div class="first">
							<ul>
								<li class="selected">
									<a href="programs.html">OUR MISSION</a>
								</li>
								<li>
									<a href="competition.html">TEAM COMPETITION</a>
								</li>
								<li>
									<a href="activities.html">ACTIVITIES</a>
								</li>
							</ul>
						</div>
						<div>
							<h3>We Have Free Templates for Everyone</h3>
							<p>
								Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a>. You can even remove all our links if you want to.
							</p>
							<h3>Be part of our community</h3>
							<p>
								If you're experiencing issues and concerns about this website template, join the discussion <a href="http://www.freewebsitetemplates.com/forums/">on our forums</a> and meet other people in the community who share the same interests with you.
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