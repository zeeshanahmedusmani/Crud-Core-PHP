<?php

	$con = mysqli_connect("localhost","root","","online_shopping") or die('Not Connected');
	
	$name =$_POST['name'];
	$price =$_POST['price'];
	$image = $_FILES['file']['name'];
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],"./upload/".$image))
		{
			$query="insert into product(product_name,price,image)values('".$name."','".$price."','".$image."')";
				 $row = mysqli_query($con , $query);
				 
				 
				 if($row)
				 {
					 echo "DONE.......";
				 }
				 
				 else
				 {
					 echo "NOT DONE";
				 }
		}

?>