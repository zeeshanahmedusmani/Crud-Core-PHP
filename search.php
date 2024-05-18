<?php
		
		$con = mysqli_connect("localhost","root","","online_shopping");
		
		
		
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			
			$query = "SELECT * FROM product where product_name='".$name."'";
			
			$result = mysqli_query($con , $query);
						echo"<table border='20'>";
				echo"<th>product Name</th><th>price</th><th>image</th>";

			while($row = mysqli_fetch_array($result))
			{
				echo"<tr>";
				echo "<td>".$row['product_name']."</td>";
				echo "<td>".$row['price']."</td>";
				echo "<td><img src='./upload/".$row['image']."'"."</td>";
				echo"</tr>";
			}
			
			
		}
		
		


	
	
	
?>

<html>
<body>
	
	<form method="post" action="#">
		Enter Product Name<input name="name" type="text">
		<input name="submit" type="submit" value="SEARCH">
	</form>
	
</body>
</html>