<?php 
	require('header.php');
	
	$class=mysql_query("SELECT DISTINCT foodItem FROM foodItem
	ORDER BY foodItem") or die(mysql_error());
	
echo "<script>";
echo "$(document).ready(function(){";
while($row = mysql_fetch_array($class)) {	
	echo "$(\".main.". $row['foodItem'] . "\") .click(function(){
		if ($(this).hasClass('open')) {
			$(\".content-wrapper.". $row['foodItem'] . "\").slideUp(\"slow\");
			$(\".open\").removeClass('open');
		} else {
			$(\".open\").removeClass('open');
			$(\".content-wrapper\").slideUp();
			$(\".content-wrapper.". $row['foodItem'] . "\").delay(400).slideDown(\"slow\");
			$(this).addClass('open');
		};
  });";

  	echo "$(\".close\").click(function(){
    $(\".content-wrapper.". $row['foodItem'] . "\").slideUp(\"slow\");
    $(\".open\").removeClass('open');
  });";  

  }
  
echo "});";
echo "</script>";

?>
    
	<div class="wrapper">
		<div class="slider">

<?php
	
	$slider=mysql_query("SELECT DISTINCT ID, foodItem, image, foodGroup FROM foodItem
	ORDER BY foodItem.foodItem") or die(mysql_error());
	
while($row = mysql_fetch_array($slider)) {
 	if ($row['foodGroup'] == 1) {

	echo "
			<a href='#' class='more'>
			<div class='main ".$row['foodItem']." fruit'>
				<div class='icon'>
					<img src='include/images/fruit/".$row['image']."' width=250>
				</div>
					<h3>".$row['foodItem']."</h3>
					<div class='group'>".$row['foodGroup']."</div>
			</div>
			</a>";
			
		} else {
		
	echo "
			<a href='#' class='more'>
			<div class='main ".$row['foodItem']." veggie hidden'>
				<div class='icon'>
					<img src='include/images/fruit/".$row['image']."' width=250>
				</div>
					<h3>".$row['foodItem']."</h3>
					<div class='group'>".$row['foodGroup']."</div>
			</div>
			</a>";
		}
}
			?>
			
			</div><!-- slider -->
	</div><!-- wrapper -->		
	
	<?php
	
	$sql=mysql_query("SELECT DISTINCT ID,foodItem,image,price FROM foodItem, foodGroupFinal, storageMethodLookup, storageMethod
			WHERE foodItem.foodGroup = foodGroupFinal.foodGroupID
			AND foodItem.ID = storageMethodLookup.foodLookup
			AND storageMethodLookup.storageLookup = storageMethod.storageID
			ORDER BY foodItem.foodItem") or die(mysql_error());

while($row = mysql_fetch_array($sql)) {
	$fooditem = $row['foodItem'];
	$image = $row['image'];
	$price = $row["price"];
	$count = $row['ID'];
	
	
	echo "<div class='content-wrapper ".$fooditem."'>
			<div class='content icon'>
				<img src='include/images/fruit/".$image."' width=250>
			</div>
			<div class='name'>	
				<h4>".$fooditem."</h4>
			</div>
			<div class='pricecontainer'>
				<h5>Average Price per Pound:</h5><p class='price'>$".$price."</p>
			</div>
			<a href='#' class='close'>close</a>
				<div class='content text'>";
				
		$storagelookup=mysql_query("SELECT storageContainer,storageLocation,storageDuration,storageNotes FROM storageMethod, foodItem, storageMethodLookup
			WHERE foodItem.ID ='$count'
			AND foodItem.ID = storageMethodLookup.foodLookup
			AND storageMethodLookup.storageLookup = storageMethod.storageID") or die(mysql_error());
				
			while($storage = mysql_fetch_array($storagelookup)) {	
					echo "<p>Store ".$storage['storageContainer']." ".$storage['storageLocation']." ".$storage['storageDuration']." ".$storage['storageNotes']."</p>";
			}		
			
	echo "	</div>
		</div>";
				
		}			
			?>
<br clear="all">	

<nav>
	<a href="#" class="fruits category selected">Fruits</a>
	<a href="#" class="vegetables category">Vegetables</a>
</nav>

<?php 
	require('footer.php')
?>