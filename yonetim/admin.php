<?

include("../baglanti.php");
session_start();


   if(isset($_SESSION["yonetici"]))
    {
    	header('Location:adminicerik.php?tbl=admin');
    }



 if(isset($_POST['admgiris']))
 {
    $admnadi=$_POST['admadi'];
    $admnsifre=$_POST['admsifre'];

    $admsorgu=@mysql_query("SELECT * FROM admin where name_admin='".$admnadi."' and password_admin=md5('".$admnsifre."')");
    $kayit_sayisiadm=@mysql_num_rows($admsorgu); 
    
    if($kayit_sayisiadm==1)
    {
       $_SESSION["yonetici"]=$admnadi;
       $_SESSION["yetki"]=1;
       header('Location:adminicerik.php?tbl=admin');
    }
    else
    {
    	header('Location:index.php');
    }

 }

?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Medusa ile İngiliççe</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div>
			<a href="admindex.php" id="logo"><img src="../images/MedusaBeyaz_4_1.png" alt="logo"></a>
			<ul>
				<li class="selected">
					<a href="../index.php"><span>H</span>ome</a>
				</li>
				
			
			</ul>
		</div>
	</div>
	<div class="body">
		<div>
			<div>
				<div>
					<div class="staff">
						<h2>ADMIN LOG IN</h2>
						<div class="first">
							<h3><span>A</span>dmin <span>L</span>og in</h3>

							<form action="" method="post">
								<input type="text" name="admadi" value="Username" onblur="this.value=!this.value?'Username':this.value;" onfocus="this.select()" onclick="this.value='';">
								<input type="password" value="" name="admsifre">
								
								<input type="Submit" name="admgiris" value="Login">
							</form>

						</div>
						<div>
							<h3>Burası Admin Paneline Giriş</h3>
							<p>
								 Admin değilseniz diğer sayfaları görmeye yetkiniz yoktur. 
								 Lütfen bilgilerinizi doğru giriniz.
							</p>
							
							
						</div>
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