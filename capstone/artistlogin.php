<?php 
   include "nav.php";
$nameError=$passError="";
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$artistname = $_POST['artistname'];
			$password = $_POST['password'];
           if(empty($password)){
                $passError="* Password required";
            }
            else{
            
            }
            $password = md5($password);
            
            
            
            
            if(!empty($artistname) && !empty($password)){
            
           $query = "select * from artist where (artistname = '$artistname' AND password = '$password') or (email = '$artistname' AND password = '$password')";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);

$count = mysqli_num_rows($result);
$address = $row['address'];
$artistname = $row['artistname'];
$image = $row['image'];

 
 if ($count == 0) {
			
	            $nameError="* Invalid artistname";
                $passError= "* Invalid Password";

 }
  else {
	   $_SESSION['artistname'] = $artistname;
	   $_SESSION['image']="<img src=$image height='10%' width='100%' class='rounded-circle'>";
	  // $_SESSION['email'] = $sessionemail;
 //echo "<p>logged in Successfully!!</p>";
      ?>  <meta http-equiv="refresh" content="0;url=main.php">
      <?php
      
 }
            
	}
            
            if(empty($artistname)){
                $nameError="* artistname required";
            }
            else{
            
            }
            
            
        }
            
        
?>
<html>
<head>

</head>
    <style>
    /* user signup form*/

.error
    {
        color : red;
        font-size:20;
    }
    .star{
        color: red;
        font-size: 20;
    }
    #pass-status
	
	{
		margin:10px;
        margin-left: 0px;
        
	}
        .login_form{
            margin-top: 150px;
            margin-left: 50px;
        }
        .art{
            margin-left: 180px;
        }
        #head{
            margin-left: 120px;
        }
        .btn{
            width: 250px;
            margin-left: 100px;
        }
        .link{
           
        margin-left: 100px;
            margin-top: 120px;
        }
</style>
<body>
<!--
    <header>
        <?php
//            include "nav.php";
        ?>
    
    </header>
-->
<form action="artistlogin.php" method="POST">
    <div class="container">
    <div class="login_form">
                
    
                <div class="form-group row">
                    <div></div>
                    <div class="col-6">
                    
                        <h1 id="head">ARTIST SIGNIN</h1>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-6">
                    <img src="images/artist.png" class="art" alt="artist" style="width:30%">
                </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-6">
                        <input class="form-control" type="text" name="artistname" plAceholder="ARTISTNAME">
                    </div>

                    <div>
                        <span class=error >
                            <?php echo $nameError;?>
                        </span>
                    </div>
                </div>
            
                <div class="form-group row">
                    
                    <div class="col-6">
                        <input class="form-control" type="password" name="password" id="password-field" placeholder="PASSWORD">
                    </div>
                    <div>
                        <i id="pass-status" name="pass" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
                    </div>
                    <div class="col-4">
                        <span class=error>
                            <?php echo $passError;?>
                        </span>
                    </div>
                </div>
                
                 <div class="form-group row">
                    
                    <div class="col-3">
                        <a href="new_pass.php" >Forgot your password?</a>
                
                    </div>
                     
                    <div class="col-4">
                        <a href="artistsignup.php" class="link">Don't have account?</a>
                    </div>
                </div>
            
        
              <div class="col-8"><input type="submit" name="submit" class="Button" value="Log in">
                </div>
        
        
                
             </div>
       
    </div>

</form>
<footer>
		<?php
		include "footer.php";?>
		
	</footer>
</body> 
</html>