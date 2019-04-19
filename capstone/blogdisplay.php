





<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<header><?php include "nav.php"; ?></header>

<?php

 $product_query = "SELECT * FROM blog";

            $product_result = mysqli_query($mysqli, $product_query);

 while($sub_row = mysqli_fetch_array($product_result))
	{ ?>
 <h2 style="text-align:center; padding:20px;color:#BA6A02;"><?php echo "".$sub_row['title']; ?></h2>
<div class="container">
    
      <hr class="style-eight" />
	<?php echo "<div><img class = 'SameSize1' src='".$sub_row['image']."'/></div>";?>
      <p style="color:#696969;padding:10px;size:10px;"><?php echo "".$sub_row['description']; ?></p>

  
</div>
	<?php } ?>


	<footer>
			<?php
				include "footer.php";
			?>
	</footer>
</body>
</html>
