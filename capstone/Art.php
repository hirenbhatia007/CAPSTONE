<?php
include "nav.php";
$nameError=$priceError=$imageError="";
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require('mysqli_connect.php');
            
             $artname=$_POST['artname'];
            $size=$_POST['size'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category=$_POST['category'];
   
            /**** art ****/
            
            if(isset($_POST['artname'])){
                $artname = filter_var($_POST['artname'], FILTER_SANITIZE_STRING);
                $userpattern =    "/^[a-zA-Z0-9 | ]+$/";
                if(empty($artname)){
                        $nameError = "* ARTNAME REQUIRED";
                }elseif(!preg_match($userpattern, $artname)) {
                        $nameError = "* PLEASE ENTER VALID ARTNAME 
                        ";    
                }
                else{
                    $artname = mysqli_real_escape_string($mysqli, trim($_POST['artname']));
                }
            }
            
        /****** File ******/
            
              $file = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            if($file=='jpg' || $file=='jpeg' || $file=='png' || $file=='gif' || $file=='')
            {
                  
             

 if($category == 'Painting') 
    $dir = 'images/painting'; 
 elseif($category == 'Photography') 
    $dir = 'images/photography'; 
 elseif($category == 'Mixed Media')
    $dir = 'images/mixed_media';
 elseif($category == 'Drawing')
    $dir = 'images/drawing';
 elseif($category == 'Digital')
    $dir = 'images/digital';
 elseif($category == 'Sculpture')
    $dir = 'images/sculpture';
 elseif($category == 'Hand Printed Works')
    $dir = 'images/hand_printed';
 elseif($category == 'Realism')
    $dir = 'images/realism';
 elseif($category == 'Modern')
    $dir = 'images/modern';
 elseif($category == 'Pop Art')
    $dir = 'images/popart';
elseif($category == 'Black & White')
    $dir = 'images/b&w';
elseif($category == 'Abstracts')
    $dir = 'images/abstract';
                
                $target = $dir;
    
    
	$filetmp = $_FILES["file"]["tmp_name"];
	$filename = $_FILES["file"]["name"];
	$filetype = $_FILES["file"]["type"];
	$filepath = $dir."/".$filename;
	echo $filepath;
	move_uploaded_file($filetmp,$filepath);


 
 
            }
            else
            {
                $imageError= " * FILE IS NOT AN IMAGE";
            } 
            
            /***** size *****/

            if (isset($_POST['size'])){
        $size = $_POST['size'];
       }
            if(isset($_POST['price'])){
                $pricepattern =    "/^\d+(,\d{3})*(\.\d{1,4})?$/";
                if(empty($price)){
                    $priceError =" *PRICE REQUIRED ";
                }
                elseif(!preg_match($pricepattern,$price)){
                    $priceError="* PLEASE ENTER VALID PRICE";
                }
                else{
                 
                }
                }
            
            /***** category *****/
            if(isset($_POST['category'])){
                $query = "select categoryid from categories where categoryname='".$category."'";
                $result = mysqli_query($mysqli, $query);
                $row = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result);
                $category = $row['categoryid'];
                

            }
            /***** ARTIST *****/
             if(empty($nameError) && empty($priceError))
    {
              $query = "select artistid from artist where artistname='".$_SESSION["artistname"] ."'";
                 $result = mysqli_query($mysqli, $query);
                 $row = mysqli_fetch_array($result);
                 $count = mysqli_num_rows($result);
                 $artistid = $row['artistid'];   
                 
          
        $sql = "INSERT INTO products (productname,image, categoryid,description,size,price,artistid)
        VALUES ('$artname','$filepath','$category', '$description', '$size', '$price','$artistid')";
        if (mysqli_query($mysqli, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
    
    }
            
            
            }

?>
<html>

<head>
    
</head>
    
<script type="text/javascript">
     
            $('#file').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        
</script>
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
    #head{
        text-align: center;
    }
    .file{
        margin-left: 14px;
        width: 200%;
    }
    .form-control{
width: 107%;
    }
    </style>
    

<body>

    
    <form action="Art.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="login_form">


                <div class="form-group row">
                    <div></div>
                    <div class="col-6">

                        <h1 id="head">Sell Your Art</h1>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        ART NAME:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="artname" plAceholder="ART NAME">
                    </div>

                    <div class="col-4">
                        <span class=error>
                            <?php echo $nameError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-2">
                        ART:
                    </div>
                    <div class="col-5 file">

                    <input type="file" name="file" class="custom-file-input" id="file" > <label class="custom-file-label" for="file">Your Art
                        </label>



                    </div>


                    <div>
                        <span class=error>
                            <?php echo $imageError;?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        CATEGORY:
                    </div>

                    <div class="col-5">

                        <select class="form-control" name="category">
                            <?php
                          require('mysqli_connect.php');
                          $query = mysqli_query($mysqli,"select * from categories");   
                          while($row=mysqli_fetch_array($query))
                          {
                             ?>
                            <option>
                                <?php echo $row["categoryname"]; ?>
                            </option>

                            <?php
                          }
                          ?>




                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        SIZE:
                    </div>

                    <div class="col-2"><label class="radio-inline"><input type="radio" name="size" value="SMALL" checked>SMALL</label></div>
                    <div class="col-2"><label class="radio-inline"><input type="radio" name="size" value="MEDIUM">MEDIUM</label></div>
                    <div class="col-2"><label class="radio-inline"><input type="radio" name="size" value="LARGE">LARGE</label></div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        DESCRIPTION:
                    </div>
                    <div class="col-5">
                        <div class="form-group">

                            <textarea class="form-control " name="description" rows="10" placeholder="DESCRIPTION"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="form-group row">
                    <div class="col-2">
                        PRICE:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="price" plAceholder="PRICE">
                    </div>

                    <div class="col-4">
                        <span class=error>
                            <?php echo $priceError;?>
                        </span>
                    </div>
                </div>
                
                




                <div class="col-8"><input type="submit" name="submit" class="button" value="Ready to sell">
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
