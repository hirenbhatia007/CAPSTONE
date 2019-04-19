<?php
require('mysqli_connect.php');
$tab_query = "SELECT * FROM categories ORDER BY categoryname ASC";
$tab_query_artists = "SELECT * FROM artist ORDER BY artistname ASC";
$tab_result = mysqli_query($mysqli, $tab_query);
$tab_artist_result = mysqli_query($mysqli, $tab_query_artists);
$tab_menu = '';
$tab_artist_menu = '';
$tab_content = '';
$tab_artist_content = '';
$i = 0;
$j=0;



while($row = mysqli_fetch_array($tab_result))
	{
	 if($i == 0)
	 {
	  $tab_menu .= 
	   '<a class="dropdown-item" href="newproducts.php?id='.$row["categoryid"].'">'.$row["categoryname"].'</a>';
	 
	  $tab_content .= '
	   <div id="'.$row["categoryid"].'" class="tab-pane fade in active ">
	  ';
	 }
	 else
	 {
		 $tab_menu .= 
	   '<a class="dropdown-item" href="newproducts.php?id='.$row["categoryid"].'">'.$row["categoryname"].'</a>';
	 
	 $tab_content .= '
	   <div id="'.$row["categoryid"].'" class="tab-pane fade">
	  ';
	 }
	 
	 $tab_content .= '<div style="clear:both"></div></div>';
	 $i++;
	}

while($row1 = mysqli_fetch_array($tab_artist_result))
	{
	 if($j == 0)
	 {
	  $tab_artist_menu .= 
	   '<a class="dropdown-item" href="artistproduct.php?id='.$row1["artistid"].'">'.$row1["artistname"].'</a>';
	 
	  $tab_artist_content .= '
	   <div id="'.$row1["artistid"].'" class="tab-pane fade in active ">
	  ';
	 }
	 else
	 {
		 $tab_artist_menu .= 
	   '<a class="dropdown-item" href="artistproduct.php?id='.$row1["artistid"].'">'.$row1["artistname"].'</a>';
	 
	 $tab_artist_content .= '
	   <div id="'.$row1["artistid"].'" class="tab-pane fade">
	  ';
	 }
	 
	 $tab_artist_content .= '<div style="clear:both"></div></div>';
	 $j++;
	}

?>
