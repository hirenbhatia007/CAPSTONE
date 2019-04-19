<?php
mysqli_query($mysqli, $tab_query);
$tab_content = '';
$i = 0;
       
if(!isset($_GET['id'])){
    header("Location:nav.php"); // anma  change krwanu che.
}
 $status=$cart_count="";
        if(isset($_POST['productid']) && $_POST['productid']!=""){
            
        $productid = $_POST['productid'];
             $product_query = "SELECT * FROM products WHERE productid ='$productid'";

            $product_result = mysqli_query($mysqli, $product_query);
            $row = mysqli_fetch_array($product_result);
            $productname=$row['productname'];
            $price=$row['price'];
            $image=$row['image'];
            $productid=$row['productid'];
            
            //Array cart
            $cartarray= array(
            $productid=>array(
            'productname'=>$productname,
            'price'=>$price,
                'productid'=>$productid,
                'quantity'=>1,
                'image'=>$image)
            );
            
            if(empty($_SESSION["shopping_cart"])){
                $_SESSION["shopping_cart"]= $cartarray;
                $status="<div class='box'>Product is added to Your cart!</div>";
            }
            else{
                //item is already added
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($productid, $array_keys)){
                    $status = "<div class='box' style='color:red;'>
                    Product is already added to cart</div>";
                }else{
                    $_SESSION["shopping_cart"]=array_merge($_SESSION["shopping_cart"],$cartarray);
                    $status = "<div class='box'>
                    Product is added to cart</div>";
                }
            }
    
        }
		
		$_SESSION["cart_count"] = $cart_count;
	
?>
  
	 <form method='post' action=''>
       
<div class="container">
<div class="row">

    <?php
    if(!empty($_SESSION["shopping_cart"])){
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    
   
    
            $product_query = "SELECT * FROM products WHERE categoryid =".$_GET['id'];

            $product_result = mysqli_query($mysqli, $product_query);
	while($sub_row = mysqli_fetch_array($product_result))
	{
		$image = $sub_row["image"];
  
         echo "<div class='col-md-3'>
             <form method='post' action=''>
			  <input type='hidden' name='productid' value=".$sub_row['productid']." />
			  <div class='image'><img class = 'img-responsive SameSize' src='".$sub_row['image']."' /></div>
			  <div class='name'>".$sub_row['productname']."</div>
		   	  <div class='price'>$".$sub_row['price']."</div>
			  <button type='submit' class='Button'>Buy Now</button>
			  </form>
		   	  </div>";
}
?>
    </div></div><br>
       
     </form>


