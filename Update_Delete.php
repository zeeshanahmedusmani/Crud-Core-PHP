<?php
		$con=mysqli_connect("localhost","root","","online_shopping")
					or die("sorry db not connected");
					
	//			echo"db connected.....";

				if(isset($_POST['event'])){
					
					$btn=$_POST['event'];
					$id=$_POST['id'];		
					$product_name=$_POST['name'];
					$price=$_POST['price'];
					$image=$_FILES['file']['name'];
					
					
					if($btn=='Update'){
						
					 if(move_uploaded_file($_FILES['file']['tmp_name'],"./upload/".$image)){
					
					$query="update product set product_name='".$product_name."',image='".$image."',price='".$price."' where product_id='".$id."'";
				
					$result=mysqli_query($con,$query);	
					 
					 if($result){
						 
						 echo"record successful  updated";
					 }
					 else{
						 echo"sorry  not updated.....";
						}
					  }
					  else{
						 
					$query="update product set product_name='".$product_name."',price='".$price."' where product_id='".$id."'";
				
					$result=mysqli_query($con,$query);	
					 
					 if($result){
						 
						 echo"record successful  updated";
					 }
					 else{
						 echo"sorry  not updated.....";
						}						 
						  
					  }
					}
					
					////////////////////////
					
					
					
					  
					
					//////////////////////////
					else if($btn=='Delete'){
						
						$query="DELETE FROM product where product_id='".$id."'";
						
						$result=mysqli_query($con,$query);	
					 
					 if($result){
						 
						 echo"record successful  Delted";
					 }
					 else{
						 echo"sorry  no deleted.....";
					 }
					 }
				}
				
				
			$query="SELECT * FROM product";

			$result=mysqli_query($con,$query);		

				echo"<center>";
				echo"<div style=' ;width:80%;height:70%;background-color:pink;overflow:auto'>";
			echo"<table border='20'>";
				echo"<th>product</th><th>price</th><th>image</th>";
			while($row=mysqli_fetch_array($result)){
				echo"<form method='post' action='#' enctype='multipart/form-data'>";
				echo"<input type='hidden' name='id' value='".$row['product_id']."'>";
				echo"<tr>";
				echo"<td>"."<input type='text' name='name' value='".$row['product_name']."'>"."</td>";
				echo"<td>"."<input type='text' name='price' value='".$row['price']."'>"."</td>";
				echo"<td>"."<img src='./upload/".$row['image']."'>"."<input type='file' name='file' >"."</td>";
				echo"<td>"."<input type='submit' name='event' value='Update'>"."</td>";
				echo"<td>"."<input type='submit' name='event' value='Delete'>"."</td>";
				
				
				echo"</tr>";
				echo"</form>";
				
			}
			echo"</div>";
	
		echo"</center>";
?>
