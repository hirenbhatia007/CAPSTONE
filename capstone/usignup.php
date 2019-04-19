<?php
include "nav.php";
$idError = $nameError = $emailError = $passError = $phoneError= $addressError=$cityError=$countryError = $agreeError =$cpassError= "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
     require('mysqli_connect.php');
       
    $username=$_POST['username'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
        
    
    
    if(isset($_POST['username'])){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $userpattern =    "/^[a-zA-Z0-9]+$/";
    if(empty($username)){
         $nameError = "* Username Required";
    }
    elseif(!preg_match($userpattern, $username)) {
         $nameError = "* PLease Enter valid Username require";    
    }
        else{
            $check="SELECT * FROM users WHERE username = '$_POST[username]'";
$rs = mysqli_query($mysqli,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
    $nameError= "User Already in Exists";
}
            else
            {
                
            }
  	}
            
        }
    if(isset($_POST['email'])){
        $email = $_POST["email"];
    $emailpattern = "/^[A-Z | a-z]+(_|\.)?[a-z0-9_]*@[a-zA-Z0-9_]+\.(com|org|co.uk|yahoo.in|pk|in)$/";
     if(empty($email)) {
         $emailError = "*Email address Required";
     }elseif(!preg_match($emailpattern, $email)) {
        $emailError = "*Valid Email address Requires";
    }
        else{
            $check="SELECT * FROM users WHERE email = '$_POST[email]'";
            $rs = mysqli_query($mysqli,$check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);
            if($data[0] > 1) {
            $emailError= "Email Id Already in Exists";
            }
            else
            {
                
            }
  	     } 
        }
    
    if(isset($_POST['password'])){
        $password = $_POST["password"];
    $passpattern ="/^.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$$/";
        if(empty($password)){
            $passError = "*Password Required";
        }elseif(preg_match($passpattern, $password)){
                 //  $p = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            $p = md5($password);
            
 
        }else{
            $passError = "*Your password must contain atleast 1 lowercase,1 
                   uppercase, 1 special character & 1 number and must be minimum 8 characters";
        }
    }
    
    if(isset($_POST['cpassword'])){
    $cpassword = $_POST["cpassword"];
    if(empty($cpassword)){
        $cpassError = " *Password Required";
    }
    elseif($cpassword != $password){
        $cpassError = " *Password should be match with above password";
    }
        
    }  
    
    
    if(isset($_POST['address'])){
       $addresspattern="^[A-Za-z0-9]{4}$";
    
    if(empty($address)){
       
    }
    elseif(!preg_match($passpattern, $password)){
        $addressError = " * Address Must be More than 4 characters";
    }
        else{}
    }  
    
    if(isset($_POST['phone'])){
    $phone = $_POST["phone"];
    $phonepattern = "/^(\d{3})(\d{3})(\d{4})$/";
     if(empty($phone)) {
         
     }elseif(!preg_match($phonepattern, $phone,$matches)) {
        $phoneError = " Please enter Valid phone number";
    }else{
         $phone = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
     }
        }
    
    if(isset($_POST['city'])&&isset($_POST['country'])){
	
				$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
				$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
				$city_regexp="/[a-zA-Z]{4,}/";
				if(empty($city)){
                    
                }elseif(!preg_match($city_regexp,$city)){
					 $cityError = "*City must be more than 4 Letters";
				}
				else {
					
				}
				$country_regexp="/[a-zA-Z]{4,}/";
				if(empty($country)){
                    
                }elseif(!preg_match($country_regexp,$country)){
					 $countryError = "*Country must be more than 4 Letters";
				}
				else {
					
				}
    }
    
    if(isset($_REQUEST['agree'])){
        
    }else{
        $agreeError ="   ** Please select the Agreement";
    }

    
    
    
    
    
    if(empty($nameError) && empty($addressError) && empty($emailError) && empty($passError) && empty($cpassError) && empty($phoneError) && empty($agreeError) )
    {
       
       
        $sql = "INSERT INTO users (username, address,city,country,phone,email,password)
        VALUES ('$username', '$address', '$city', '$country', '$phone', '$email', '$p')";

        if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
        } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
    
    }
    
}
?>


<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <script type="text/javascript" src="js/scripts.js"></script>
</head>
<style>
    /* user signup form*/
.us_form {
    margin: 80px;
    margin-top: 50px;
    margin-left: 200px;
}
    
.fa {
    margin-bottom: 10px;
}



.error
    {
        color : red;
        font-size:15;
        
    }
    #star{
        color: red;
        font-size: 20;
    }
    #pass-status,#pass-status1
	
	{
		margin:10px;
        margin-left: 0px;
        
	}
    #btn{
        font-size: 20;
        width: 150;
        
        margin-left: 70px;
    }
    .art{
        border-radius: 50%;
        margin-left: 130px;
    }
     #head{
text-decoration: underline;
        text-align: center;
         margin-left: 20px;
    }
    #agree{
        margin-left: 150px;
        margin-top: 50px;
    }
    
</style>

<body>

    <form action="usignup.php" method="POST">
        <div class="container">
            
            
            <div class="us_form">
                <div class="form-group row">
                    
                    <div class="col-7">
                    
                        <h1 id="head">User Registration</h1>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-10">
                    <img src="images/user1.png" class="art" alt="artist" style="width:30%">
                </div>
                </div>
                <div class="form-group row">
                    <div id="star">**</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="username" plAceholder="USERNAME">
                    </div>

                    <div>
                        <span class=error name="error">
                            <?php echo $nameError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div id="star">&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="address" placeholder="ADDRESS">
                    </div>
                    <div>
                        <span class=error>
                            <?php echo $addressError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div id="star">&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="city" placeholder="CITY">
                    </div>
                    <div>
                        <span class=error>
                            <?php echo $cityError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div id="star">&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="country" placeholder="COUNTRY">
                    </div>
                    <div>
                        <span class=error>
                            <?php echo $countryError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div id="star">&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="phone" placeholder="PHONE">
                    </div>
                    <div>
                        <span class=error>
                            <?php echo $phoneError;?>
                        </span>
                    </div>

                </div>
                <div class="form-group row">
                    <div id="star">**</div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="email" placeholder="EMAIL">
                    </div>
                    <div class="col-4">
                        <span class=error name="error">
                            <?php echo $emailError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div id="star">**</div>
                    <div class="col-7">
                        <input class="form-control" type="password" name="password" id="password-field" placeholder="SET PASSWORD">
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
                    <div id="star">**</div>
                    <div class="col-7">
                        <input class="form-control" type="password" name="cpassword" id="password-field1" placeholder="CONFIRM PASSWORD">
                    </div>
                    <div>
                        <i id="pass-status1" name="cpass" class="fa fa-eye" aria-hidden="true" onClick="viewPassword1()"></i>
                    </div>
                    <div class="col-3">
                        <span class=error>
                            <?php echo $cpassError;?>
                        </span>
                    </div>
                    
                    <div class="row">
                    
                    
                    <div class="col-sm-10" id="agree">
                        <input class="form-check-input" type="checkbox" name="agree">I accept the <a href="">terms and conditios</a><span class=error>
                            <?php echo $agreeError;?>
                        </span>
                    </div>
                    </div>

                </div>
                <div class="form-group row">
                    
                <div class="btn">
                    <input type="submit" id="btn" name="submit" class="Button" value="Register">
                    <input  type="reset" id="btn" name="reset" class="Button" value=" Clear " >
                </div>
                    
                    
                
                </div>
                <div class ="form-group row">
                    <div class="col-2"></div>
                <div class="col-5"><label>Already have an account<a href="userlogin.php">Sign in</a></label></div>
                    
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
