<?php		

		$id = $_REQUEST['id'];


		$con=mysqli_connect("localhost","root","","online_shopping")
					or die("sorry db not connected");
					
		$query = "SELECT * FROM product where product_id = '".$id."'";
		
		$result =mysqli_query($con ,$query);
		
		echo"<table border='20'>";
		echo"<th>product</th><th>price</th><th>image</th>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";		
			echo "<td>".$row['product_name']."</td>";		
			echo "<td>".$row['price']."</td>";	
			echo "<td>"."<a href='related_product.php?id=".$row['product_id']."'>"."<img src='./upload/".$row['image']."'></a></td>";
			echo "</tr>";		
			
		}
		
		$query = "SELECT * FROM related_product where product_id = '".$id."'";
		
		$result =mysqli_query($con ,$query);
		
		echo"<table border='20'>";
		echo"<th>product</th><th>price</th><th>image</th>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";		
			echo "<td>".$row['r_product_name']."</td>";		
			echo "<td>".$row['price']."</td>";	
			echo "<td>"."<a href='related_product.php?id=".$row['product_id']."'>"."<img src='./upload/".$row['image']."'></a></td>";
			echo "</tr>";		
			
		}

?>