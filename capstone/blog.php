<?php
include "nav.php";
$nameError=$imageError="";
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            
             $blogname=$_POST['blogname'];
            $description=$_POST['description'];
           
           
   
            /**** art ****/
            
            if(isset($_POST['blogname'])){
                $blogname = filter_var($_POST['blogname'], FILTER_SANITIZE_STRING);
                $userpattern =    "/^[a-zA-Z0-9 | ]+$/";
                if(empty($blogname)){
                        $nameError = "* BLOGNAME REQUIRED";
                }elseif(!preg_match($userpattern, $blogname)) {
                        $nameError = "* PLEASE ENTER VALID BLOGNAME 
                        ";    
                }
                else{
                    $blogname = mysqli_real_escape_string($mysqli, trim($_POST['blogname']));
                }
            }
            
        /****** File ******/
            
             $file = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
 
            if($file=='jpg' || $file=='jpeg' || $file=='png' || $file=='gif' || $file=='')
            {
                $filetmp = $_FILES["file"]["tmp_name"];
	           $filename = $_FILES["file"]["name"];
	           $filetype = $_FILES["file"]["type"];
	           $filepath = "images/Blog/".$filename;
	           move_uploaded_file($filetmp,$filepath);
 
            }
            else
            {
                $imageError= " * File is not an image";
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
                 
          
        $sql = "INSERT INTO blog (title,image,description,date,artistid)
        VALUES ('$blogname','$filepath', '$description',CURDATE(),'$artistid')";
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

    
    <form action="blog.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="login_form">


                <div class="form-group row">
                    <div></div>
                    <div class="col-6">

                        <h1 id="head">ADD Your Blog</h1>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        BLOG NAME:
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="blogname" plAceholder="BLOG NAME">
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
                        DESCRIPTION:
                    </div>
                    <div class="col-5">
                        <div class="form-group">

                            <textarea class="form-control " name="description" rows="10" placeholder="DESCRIPTION"></textarea>
                        </div>
                    </div>

                </div>
                <div class="col-8"><input type="submit" name="submit" class="Button" value="ADD YOUR BLOG">
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
