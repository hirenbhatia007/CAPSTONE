<html>

<head>
</head>
<style>
    /* user signup form*/
    .container{
       
 padding-right: 15px;
   padding-left: 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 300px;
   overflow:hidden;
   min-height:0px;
    }
    .row{
       padding-bottom: 10px; 
    }
    
    .form{
        margin:100px;
    }
    .btn{
        margin: 1px;
        width:300px;
        }
    .img{
        border-radius: 20%; 
    }
    .h1{
        text-align: center;
        text-decoration: underline;
    }
</style>

<body>
    <?php
include "nav.php";
?>
<div class="container">
    <form action="login.php" method="POST">
        <div class="container-fluid">
            
            <div class="form">
                <div class=" row">
                <div class="col-6">
                   <h1 class="h1">Login</h1>
                </div>
                
            </div>    
            <div class="form-group row">
                <div class="col-4">
                    <img src="images/artist.png" class="img" alt="artist" style="width:55%">
                </div>
                <div class="col-4">
                    <img src="images/user1.png" class="img" alt="user" style="width:55%">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-4">
                    <input type="button" id="btn" value="As an artist" class="button" onClick="location.href='artistlogin.php'">
                </div>
                <div class="col-4">
                    <input type="button" id="btn" value="As an users" class="button" onClick="location.href='userlogin.php'">
                </div>
</div>
            </div>
        </div>

    </form>
	</div>
	
	<footer>
		<?php
		include "footer.php";
		?>
		
	</footer>
</body>

</html>
