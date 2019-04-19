<?php
session_start();
    include "navScript.php";
?>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="nav.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
    <div class="row">

        <div class="col-md-10">
            <p class="titlemsg"><a href="main.php"><img src="images/artLogo.jpg" alt="logo of the site" height="100" width="100"></a> catch your art here</p>
        </div>


  <div class="col-md-1">
		   <?php
if (isset( $_SESSION['artistname'] ) ) 
{	
	echo "".$_SESSION['image'];?>
	<strong style="color:#838483;font-family:Times New Roman, Times, serif;font-weight:bold;font-size:20px;margin:30%;"><?php echo "".$_SESSION['artistname'];  ?></strong>
		</div>
		<div class="col-md-1 " style="margin-top:50px; ">
			<button onclick="window.location.href='logout.php'" class="button" >Log Out</button>
			
		</div>
 </div>
  <div class="container-fluid">
        <div class="row ">
            <div class="col-12 position">
                <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                    <div class="collapse navbar-collapse " id="navbar">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Art</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By type</h5>
											<?php
//											 include "navScript.php";
                                            echo $tab_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By price</h5>
                                            <a class="dropdown-item" href="#">Upto $500</a>
                                            <a class="dropdown-item" href="#">$500 to $1000</a>
                                            <a class="dropdown-item" href="#">$1000 to $1500</a>
                                            <a class="dropdown-item" href="#">$1500 to $2000</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artists</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
                                    <div class="row">

                                        <div class="col-sm-6 col-lg-3">
                                             <h5>By type</h5>
											<?php

											   echo $tab_artist_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-5">
                                            <h5>Photography</h5>
                                            <a class="dropdown-item" href="#">Steve McCurry</a>
                                            <a class="dropdown-item" href="#">Lee jeffries</a>
                                            <a class="dropdown-item" href="#">Jimmy Nelson</a>
                                            <a class="dropdown-item" href="#">Rehanhn</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
									
							        <li class="nav-item dropdown megamenu-li">
                                <a class="navbar-brand" href="blog.php">Blog</a>
								
								
								
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
							
						
							
                            <li class="nav-item dropdown megamenu-li">
                                <a class="navbar-brand" href="blogdisplay.php">DisplayBlog</a>
                               
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
                            <li class="nav-item dropdown megamenu-li lasan">
                                <a class="navbar-brand" href="contact.php">contact</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
							
							
							
							  <li>
    
     <?php
        if(!empty($_SESSION["shopping_cart"])){
            $cart_count = count(array_keys($_SESSION['shopping_cart']));
            ?>
   <div class="cart_div">
    
       <a href="cart.php"><img class='img-responsive' src="images/cart-icon.png" /><span>
        <?php echo $cart_count; ?></span></a> 
    </div>
    <?php
        }
    ?>
  </li>
	<li>	
           
			 <a href="Art.php"><img class = "img-responsive" style="height:50px;width:60px;" src="images/add.png" />Add Art</a>

					</li>	
					
					
	      

							
							
                        </ul>
                 <div class="col-sm-6"><button class="button" style="float:right;" onClick="location.href='login.php'">Accounts</button>  </div> 
                </nav>
       

        </div>
        
    </div>
<!--//end of the header file here-->


	<?php } elseif(isset( $_SESSION['username'] ) ) {	?>
	<strong style="color:#838483;font-family:Times New Roman, Times, serif;font-weight:bold;font-size:20px;margin-top:30%;margin-left:30%;"><?php echo "".$_SESSION['username'];  ?></strong>
		</div>
		<div class="col-md-1 " style="margin-top:50px; ">
			<button onclick="window.location.href='logout.php'" class="button" >Log Out</button>
			
		</div>
 </div>
  <div class="container-fluid">
        <div class="row ">
            <div class="col-12 position">
                <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                    <div class="collapse navbar-collapse " id="navbar">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Art</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By type</h5>
											<?php
//											 include "navScript.php";
                                            echo $tab_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By price</h5>
                                            <a class="dropdown-item" href="#">Upto $500</a>
                                            <a class="dropdown-item" href="#">$500 to $1000</a>
                                            <a class="dropdown-item" href="#">$1000 to $1500</a>
                                            <a class="dropdown-item" href="#">$1500 to $2000</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artists</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
                                    <div class="row">

                                        <div class="col-sm-6 col-lg-3">
                                             <h5>By type</h5>
											<?php

											   echo $tab_artist_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-5">
                                            <h5>Photography</h5>
                                            <a class="dropdown-item" href="#">Steve McCurry</a>
                                            <a class="dropdown-item" href="#">Lee jeffries</a>
                                            <a class="dropdown-item" href="#">Jimmy Nelson</a>
                                            <a class="dropdown-item" href="#">Rehanhn</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
							  
				
							
                            <li class="nav-item dropdown megamenu-li">
                                <a class="navbar-brand" href="blogdisplay.php">DisplayBlog</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
                            <li class="nav-item dropdown megamenu-li lasan">
                                <a class="navbar-brand" href="contact.php">contact</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
							
							
							
							  <li>
    
     <?php
        if(!empty($_SESSION["shopping_cart"])){
            $cart_count = count(array_keys($_SESSION['shopping_cart']));
            ?>
   <div class="cart_div">
    
       <a href="cart.php"><img class='img-responsive' src="images/cart-icon.png" /><span>
        <?php echo $cart_count; ?></span></a> 
    </div>
    <?php
        }
    ?>
  </li>
                        </ul>
                 <div class="col-sm-6"><button class="button" style="float:right;" onClick="location.href='login.php'">Accounts</button>  </div> 
                </nav>
       

        </div>
        
    </div>
<!--//end of the header file here-->


	<?php }
	
 else{ ?>

 
 
        
	<strong style="color:#838483;font-family:Times New Roman, Times, serif;font-weight:bold;font-size:20px;margin:30%;"></strong>
		</div>
		<div class="col-md-1 " style="margin-top:50px; ">
			
		</div>
 </div>
 
 
 
 
 
  <div class="container-fluid">
        <div class="row ">
            <div class="col-12 position">
                <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                    <div class="collapse navbar-collapse " id="navbar">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Art</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By type</h5>
											<?php
//											 include "navScript.php";
                                            echo $tab_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <h5>By price</h5>
                                            <a class="dropdown-item" href="#">Upto $500</a>
                                            <a class="dropdown-item" href="#">$500 to $1000</a>
                                            <a class="dropdown-item" href="#">$1000 to $1500</a>
                                            <a class="dropdown-item" href="#">$1500 to $2000</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="nav-item dropdown megamenu-li">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artists</a>
                                <div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
                                    <div class="row">

                                        <div class="col-sm-6 col-lg-3">
                                             <h5>By type</h5>
											<?php

											   echo $tab_artist_menu;
											?>
                                        </div>
                                        <div class="col-sm-6 col-lg-5">
                                            <h5>Photography</h5>
                                            <a class="dropdown-item" href="#">Steve McCurry</a>
                                            <a class="dropdown-item" href="#">Lee jeffries</a>
                                            <a class="dropdown-item" href="#">Jimmy Nelson</a>
                                            <a class="dropdown-item" href="#">Rehanhn</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
							 
                            <li class="nav-item dropdown megamenu-li">
                                <a class="navbar-brand" href="blogdisplay.php">DisplayBlog</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>
                            <li class="nav-item dropdown megamenu-li lasan">
                                <a class="navbar-brand" href="contact.php">contact</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </li>

       
  	  <li>     <div class="cart_div">
    
       <a href="cart.php"><img class='img-responsive' src="images/cart-icon.png" /><span>
	   <?php
        if(!empty($_SESSION["shopping_cart"])){
            $cart_count = count(array_keys($_SESSION['shopping_cart']));

        }?>
  </span></a> 
    </div>
    
  </li>
 
						
							
                        </ul>
                   <div class="col-sm-6"><button class="button" style="float:right;" onClick="location.href='login.php'">Accounts</button>  </div> 
                </nav>
         

        </div>
        
    </div>
<!--//end of the header file here-->



							
<?php   
} 
?>
	
	

   
      

		  
		  </body>
		  
		 
                    

</html>
		  
		  

    