<?php

				include "nav.php";
				
if($_GET['key'] && $_GET['reset'])
{
	
  $email=$_GET['key'];
  $pass=$_GET['reset'];
$q ="select email,password from users where email='$email' and password='$pass'";
$r = @mysqli_query($mysqli, $q); 
  if(mysqli_num_rows($r)==1)
  {
    ?>
	<html>
	<head>
	
	
	</head>
	<body>
		
		<main>
    <form method="post" action="submit_new.php">
	<div class="container">	
    <input type="hidden" name="email" value="<?php echo $_GET['key'];?>">
	
	
	
	<div class="form-group col">
                     
                    <div class="row-md-6" style="padding:2%;">
                        <input class="form-control" type="password" name="password" id="password-field" placeholder="Enter new Password">
                    </div>
					<div class="row-md-6" style="padding:2%; text-align:center;">
                    <input type="submit" class="Button" name="submit_password"></div>
                </div>
   
    
    
	</div>
    </form>
	<main>
	<footer>
		<?php 
			include "footer.php";
		?>
		</footer>
	</body>
	</html>
    <?php
  }
}
?>