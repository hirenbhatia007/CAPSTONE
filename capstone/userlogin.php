<?php 
include "nav.php";
$nameError=$passError="";
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
            if(empty($password)){
                $passError="* Password required";
            }
            else{
            
            }
            $password = md5($password);
         
            if(!empty($username) && !empty($password)){
                    $q =mysqli_prepare($mysqli, "select * FROM users WHERE username=email=? AND password =?");
 mysqli_stmt_bind_param($q, 'is', $username, $password);
 mysqli_stmt_execute($q);
 mysqli_stmt_store_result($q);
 if (mysqli_stmt_num_rows($q) == 0) {
	            $nameError="* Invalid username";
                $passError= "* Invalid password";
 }
  else {
      $_SESSION['username'] = $username;
 echo "<p>logged in Successfully!!</p>";
         ?>  <meta http-equiv="refresh" content="0;url=main.php">
      <?php
 }
            
	}
            if(empty($username)){
                $nameError="* Username required";
            }
            else{
            
            }
            
            if(empty($password)){
                $passError="* Password required";
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
            margin-left: 150px;
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
<form action="userlogin.php" method="POST">
    <div class="container">
    <div class="login_form">
                
    
                <div class="form-group row">
                    <div></div>
                    <div class="col-6">
                    
                        <h1 id="head">User Signin</h1>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-6">
                    <img src="images/user1.png" class="art" alt="artist" style="width:30%">
                </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-6">
                        <input class="form-control" type="text" name="username" plAceholder="USERNAME">
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
                        <a href="usignup.php" class="link">Don't have account?</a>
                    </div>
                </div>
            
        
              <div class="col-8"><input type="submit" name="submit" class="Button"  value="Log in">
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