<?php
include "nav.php";
$nameError = $myError = $emailError = $ccError=$cvvError = $phoneError= $addressError=$cityError=$countryError= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $fullname=$_POST['fullname'];
$ccnumber=$_POST['ccnumber'];
$cvvnumber=$_POST['cvvnumber'];
$month=$_POST['month'];
$year=$_POST['year'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$total = $_SESSION['totalprice'];
//    FULLNAME
    if(isset($_POST['fullname'])){
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $userpattern =    "/^[a-zA-Z0-9 | ]+$/";
    if(empty($fullname)){
         $nameError = "* FULLNAME REQUIRED";
    }
    elseif(!preg_match($userpattern, $fullname)) {
         $nameError = "* PLEASE ENTER YOUR FULLNAME";    
    }
        else{
            
  	     }   
        }
    
        
//    EMAIL
    if(isset($_POST['email'])){
        
    $emailpattern = "/^[A-Z | a-z]+(_|\.)?[a-z0-9_]*@[A-Z |a-z |0-9_]+\.(com|COM|org|ORG|co.uk|CO.UK|yahoo.in|YAHOO.IN|IN|in)$/";
     if(empty($email)) {
         $emailError = "*Email address Required";
     }elseif(!preg_match($emailpattern, $email)) {
        $emailError = "*Valid Email address Requires";
    }
        else{
           
  	     } 
        }

//    EMAIL
    if(isset($_POST['phone'])){
        
    $phonepattern = "/^(\d{3})(\d{3})(\d{4})$/";
     if(empty($phone)) {
         
     }elseif(!preg_match($phonepattern, $phone,$matches)) {
        $phoneError = " Please enter Valid phone number";
    }else{
         $phone = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
     }
        }
    
//    CITY & COUNTRY
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
        
        $my_regex = "/^(\d{4})$/";
        if(!preg_match($my_regex,$month) && !preg_match($my_regex,$year)){
           $myError = "*PLEASE SELECT MONTH AND YEAR";
    
        }else{
            
        }

if(isset($_POST['ccnumber'])){
        $ccpattern="/^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/"; 
   if(empty($ccnumber)) {
       
     }elseif(!preg_match($ccpattern, $ccnumber)) {
        $ccError = " Please enter Valid credit card number";
    }else{
         $ccnumber=$_POST['ccnumber'];
     }
    }

if(isset($_POST['cvvnumber'])){
    $cvvpattern="/^(\d{3})$/";
    
if(empty($cvvnumber)) {
       
     }elseif(!preg_match($cvvpattern, $cvvnumber)) {
        $ccError = " Please enter Valid credit card number";
    }else{
       
     }
    }    
    
    
    
    
    if(empty($nameError) && empty($addressError)  && empty($emailError) && empty($myError) && empty($cvvError) && empty($ccError) && empty($phoneError))
    {
       $query = "select userid from users where username='".$_SESSION["username"] ."'";
                 $result = mysqli_query($mysqli, $query);
                 $row = mysqli_fetch_array($result);
                 $count = mysqli_num_rows($result);
                 $userid = $row['userid'];   
          
        $sql = "INSERT INTO orders (userid,total,fullname,address,city,country,phone,cardnumber,securitycode,email,exprydate)
        VALUES ('$userid','$total','$fullname','$address','$city','$country','$phone','$ccnumber','$cvvnumber', '$email','$month/$year')";

        if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
        } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
    
    }
//    
//
        }
}
?>


<html lang="en">

<head>
</head>
    
<style>
    /* user signup form*/
.us_form {
    margin: 80px;
    margin-top: 50px;
    margin-left: 200px;
    background-color: antiquewhite;
}
    .contact-form{
        margin-top: -30px;
        background-color: blanchedalmond;
    }
    
.fa {
    margin-bottom: 10px;
}
    .form-control{
     width:106%;   
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
        margin-left: 17px;
        
	}
    #btn{
        font-size: 20;
        width: 150;
        
        margin-left: 70px;
    }
    .art{
        border-radius: 50%;
        margin-left: 150px;
    }
    #agree{
        margin-left: 130px;
    }
    #head{
text-decoration: underline;
        text-align: left;
    }
    .passerror{
      margin-left: -20px;  
    }
    #photo{
background-color: antiquewhite;
        margin-left: 30px;
    }
</style>

<body>

    <form action="checkout.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            
            
            <div class="us_form">
                 
        
                <div class="form-group row">
                     
                     <div class="col-8">
                       <h3 id="head">Credit or Debit card Information:</h3>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-3">
                        FULL NAME:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="fullname" plAceholder="CARD HOLDER NAME">
                    </div>

                    <div class="col-4">
                        <span class=error>
                            <?php echo $nameError;?>
                        </span>
                    </div>
                </div>
                
                <div class="form-group row">
                   
                    <div class="col-3">
                        CARD NUMBER:
                    </div>
                    <div class="col-5">  
                        <input type="text" class="form-control" name="ccnumber" plAceholder="CARD NUMBER"/>
                    </div>
                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $ccError;?>-->
                        </span>
                    </div>
                </div>
                 

                <div class="form-group row">
                    
                    <div class="col-3">
                         SECURITY CODE:
                    </div>
                    <div class="col-5">  
                        <input type="text" class="form-control" name="cvvnumber" placeholder="CVV NUMBER"/>
                    </div>
                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $cvvError;?>-->
                        </span>
                    </div>
                </div>
                
                <div class="form-group row">
                    
                    <div class="col-3">
                        EXPIRY DATE:
                    </div>

                    <div class="col-2">
                        <?php
                            $MonthArray = array(
                                    "1" => "JAN", "2" => "FEB", "3" => "MAR", "4" => "APR",
                                    "5" => "MAY", "6" => "JUN", "7" => "JUL", "8" => "AUG",
                                    "9" => "SEP", "10" => "OCT", "11" => "NOV", "12" => "DEC",
                                                );
                        ?>
                        <select name="month" class="form-control">
                        <option value="">Month</option>
                        <?php
                        foreach ($MonthArray as $monthNum=>$month) {
                                $selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                     <div class="col-2">
                     <select name="year" class="form-control">
                        <option value=''>Year</option>
                        <?php
                        for ($year = 2018; $year <= 2030; $year++) {
                                $selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
                        echo "<option value=$year $selected>$year</option>";
                        }
                        ?>
                    </select>
                     
                     
                     </div> 
                     <div class="col-4">
                        <span class=error>
                            <?php echo $myError;?>
                        </span>
                    </div>
                </div>
            </div>
<!--
                //////// Contact Information ///////
                
-->         <div class="us_form contact-form">
                <div class="form-group row">
                     
                     <div class="col-8">
                       <h3 id="head">Billing Information:</h3>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-3">
                        ADDRESS:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="address" plAceholder="ADDRESS">
                    </div>

                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $address;?>-->
                        </span>
                    </div>
                </div>
                
                <div class="form-group row">
                    
                    <div class="col-3">
                       CITY:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="city" plAceholder="CITY">
                    </div>

                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $city;?>-->
                        </span>
                    </div>
                </div>
                
                <div class="form-group row">
                   
                    <div class="col-3">
                        COUNTRY:
                    </div>
                    <div class="col-5">  
                        <input type="text" class="form-control" name="country" plAceholder="COUNTRY"/>
                    </div>
                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $country;?>-->
                        </span>
                    </div>
                </div>
                 <div class="form-group row">
                   
                    <div class="col-3">
                        PHONE:
                    </div>
                    <div class="col-5">  
                        <input type="text" class="form-control" name="phone" plAceholder="PHONE"/>
                    </div>
                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $phoneError;?>-->
                        </span>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-3">
                        EMAIL:
                    </div>
                    <div class="col-5">  
                        <input type="text" class="form-control" name="email" placeholder="EMAIL"/>
                    </div>
                    <div class="col-4">
                        <span class=error>
<!--                            <?php echo $emailError;?>-->
                        </span>
                    </div>
                </div>
                   
                    
<!--
                <div class="form-group row">
                    
                    
                    <div class="col-10" id="agree">
                        <input class="form-check-input" type="checkbox" name="agree">I accept the <a href="">terms and conditios</a><span class=error>
                            <?php echo $agreeError;?>
                        </span>
                    </div>
                    
                </div>
-->
                
<!--
                    <div class="form-group row"><br></div>
                    <div class ="form-group row">
                        <div id="star">&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-12">
                        <input class="form-check-input" type="checkbox" >I accept the <a href="">terms and conditios</a>
                            
                            </div>
                    </div>
-->

                
                
                <div class ="form-group row">
                <div >
                    <input type="submit" id="btn" name="submit" class="Button" id="insert" value="Register">
                    <input type="reset" id="btn" name="reset" class="Button" value=" Clear ">

                    </div>
                </div >
                
<!--
                <div class="form-group row">
                    
                    
                    <div class="col-9" id="agree">
                        <label>Already have an account?<a href="artistlogin.php">Sign in</a></label>
                    </div>
                    
                </div>
                
-->
<!--
                <div class ="form-group row">
                    <div class="col-1"></div>
                    <div class="col-5"><label>Already have an account?<a href="artistlogin.php">Sign in</a></label></div>
                    
                
                </div>
-->
            </div>
        </div>


    </form>

</body>

</html>
