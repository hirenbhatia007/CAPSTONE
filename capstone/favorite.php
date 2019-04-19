<?php
include "mysqli_connect.php";
$query_favorite = "SELECT userid, productid FROM favorite";
$favorite = mysqli_query($mysqli,$query_favorite);
$row_favorite = mysqli_fetch_assoc($favorite);
$totalRows_favorite = mysqli_num_rows($favorite);

if(in_array($_POST['id'], $row_favorite))
{
   //is already favourited, run a query to remove that row from the db, so it won't be favorited anymore

}
else
{
   //post is not favourited already, run a query to add a new favourite to the db.
}

?>