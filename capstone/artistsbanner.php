<?php
//require('mysqli_connect.php');
mysqli_query($mysqli, $tab_query_artists);
//$tab_menu = '';
$tab_artist_content = '';
$j = 0;
if(!isset($_GET['id'])){
    header("Location:nav.php"); // anma  change krwanu che.
}

$product_query = "SELECT * FROM artist WHERE artistid =".$_GET['id'];

$product_result = mysqli_query($mysqli, $product_query);
?>

<div class="container">
<div class="row">

    <?php
	while($sub_row = mysqli_fetch_array($product_result))
	{
		$image = $sub_row["image"];
    ?>
    
    
        <div class="col-md-9">
             <h2> <?php echo $sub_row['artistname'];?></h2>
             <h3> <?php echo $sub_row['address'];?>&nbsp;<br>
                        <?php echo $sub_row['city'];?>&comma;
                        <?php echo $sub_row['country'];?>&period;
            </h3>
            <h2> <?php echo $sub_row['email'];?></h2>
        </div>
                
            <div class="col-md-3">
            <h4><?php echo '<img src="'.$sub_row['image'].'" class="img-responsive img-thumbnail SameSize"></img>';?></h4></div>
           
    
<?php
}
?>
    </div></div>


  
