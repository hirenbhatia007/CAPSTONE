<?php
    include "nav.php";
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {	
foreach ($_SESSION["shopping_cart"] as $select => $val) {
    $productid=$_POST["productid"];
	$_SESSION['productid'] = $productid;
        if($val["productid"] == $productid)
        {
            unset($_SESSION["shopping_cart"][$select]);
             echo "Product removed";
        }
    }
}
    
}
?>
<html>
<head>
<title>Cart</title>
</head>
<body>
  <h2><center>Shopping cart</center></h2>
    <div class="cart">
        <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price=0;
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">ITEM NAME</th>
                    <th scope="col">description</th>
                    <th scope="col">UNIT PRICE</th>
					<th scope="col"></th>
					
                    
                    
                </tr>
				<thead>
				<tbody>
                <?php
					foreach ($_SESSION["shopping_cart"] as $product){
            ?>
                <tr>
				
                    <td><img src='<?php echo $product["image"]; ?>' class="img-responsive" width="16.50%" height="150px" /></td>
                    
                    <td><?php echo $product["productname"]; ?><br />
                    <form method='post' action=''>
						
					   <input type='hidden' name='productid' value="<?php echo $product["productid"]; ?>" />
                        <input type='hidden' name='action' value="remove" /></td>
						<td><?php echo "$".$product["price"]; ?></td>

					<td>
                        <button type='submit' class='Button'>Remove Item</button>
                    
						</form>
                    </td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='productid' value="<?php echo $product["productid"]; ?>" />
                        </form>
                    </td>
                </tr>
                
                
                
                <?php
            $total_price += ($product["price"]);
        }
        ?>
                <tr>
                    <td colspan="5" align="right">
                        <strong>Total: <?php echo "$".$total_price;?></strong>
                   <?php $_SESSION['totalprice'] = $total_price; ?>
                    </td>
                </tr>
            </tbody>
        
        
        
        </table>
        
        <?php
		
        }else{
        echo "<h3>Your cart is empty</h3>";
    }
    ?>
    </div>
    <div style="clear:both;"></div>
    <div class="message_box" style="margin:10px 0px;">
        <?php echo $status;
        ?>
    
    </div>
    <button type='index' class="Button" onClick="location.href='main.php'">Inventory</button>
	
	<?php if (isset( $_SESSION['username'] ) || isset( $_SESSION['username'] ) ) 
{	?>
<button type='Checkout' class="Button" onClick="location.href='checkout.php'">Checkout</button>
<?php }  else {?>
	<button type='login' class="Button" onClick="location.href='login.php'">Checkout</button>
<?php } ?>
<footer>
		<?php
		include "footer.php";?>
		
	</footer>
</body>
</html>