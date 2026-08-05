<?php 
include("config/akses_login.php");
include("config/koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?><!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form using HTML5 and CSS3</title>
  
  
  
      <link rel="stylesheet" href="login/style.css">

  
</head>

<body>
  	<body>
		<div class="container">
			<section id="content">

				<?php
				if(isset($_GET['login']))
					{
						$user = mysqli_real_escape_string($koneksi, htmlentities($_GET['username']));
						$pass = mysqli_real_escape_string($koneksi, htmlentities($_GET['password']));

						//$pass = mysqli_real_escape_string($koneksi, htmlentities(MD5($_GET['password'])));
																		
						$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'") or die(mysqli_error($koneksi));
							if(mysqli_num_rows($sql) == 0)
								{
									echo '<center><span class="label label-danger">USER TIDAK DI TEMUKAN !!!</span></center>';							 
								}
							else
								{
									$row = mysqli_fetch_assoc($sql);
									//$_SESSION['userwis']=$user;
									if($row['id_role'] == 1)
										{
											$_SESSION['userwis']=$user;
$_SESSION['id_role']=1;
											echo '<script language="javascript">document.location="admin.php";</script>';
										}
									//elseif($row['id_role'] == 2)
										//{
											//$_SESSION['id_role']=2;
											//echo '<script language="javascript">document.location="admin.php";</script>';
										//}
									//elseif($row['id_role'] == 3)
										//{
											//$_SESSION['id_role']=3;
											//echo '<script language="javascript">document.location="index.php";</script>';
										//}
									//elseif($row['id_role'] == 4)
										//{
											//$_SESSION['id_role']=4;
											//echo '<script language="javascript">document.location="admin.php"</script>';
										//}
else
										{
										echo '<script language="javascript">document.location="index.php";</script>';
										}
								}
					}
			?>
				<form action="">
					<h1>Login to Sim Wisuda</h1>
					<div>
						<input type="text" placeholder="Username" required="" id="username" name="username" />
					</div>
					<div>
						<input type="password" placeholder="Password" required="" id="password" name="password" />
					</div>
					<div>
						<input type="submit" name="login" value="login" value="Log in" />
						<a href="index.php">Cancel</a>
						<a href="#">Only Admin</a>
					</div>
				</form><!-- form -->
				<div class="button">
					<a href="http://stikesmuhgombong.ac.id">UNIMUGO</a>
				</div><!-- button -->
			</section><!-- content -->
		</div><!-- container -->
	</body>
  
    <script src="login/index.js"></script>

</body>
</html>
