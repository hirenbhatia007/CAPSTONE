 <?php
    include "nav.php";
    ?>
<html>

<head>
 

</head>

<style>
    .container{
        
        margin: 100px;
    }    
    #p{
        margin-left: 100px;  
    }
    #btn{
        margin-left: 160px; 
        width: 40%;
    }
    #image{
        margin-left: 160px;
    }
    .head{
        margin-left:150px;
        text-decoration: underline;
    }
</style>
<body>
<main>
<div class="container">
    <form method="post" action="send_link.php">

        <div class="reset_form">
            <div class="container">
                <div class="form-group">
                    <h2 class="head">Reset Password</h2>
                    <div class="col-6" id="image">
                        
                        <img src="images/resetpassword.png" height="12%">
                    </div>
                    <div class="col-7" id="p">
                        <p><kbd>Enter Email Address To Send Password Link</kbd></p>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="email" placeholder="EMAIL">
                    </div>

                </div>
                <div class="col-5">
                    <input type="submit" id="btn" class="Button" name="submit_email">
                </div>
            </div>
        </div>

    </form>
	</div>
	</main>
	<footer>
		<?php 
			include "footer.php";
			?>
	
	</footer>
</body>

</html>
