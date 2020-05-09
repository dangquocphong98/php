<?php 
	$mysqli = new mysqli('localhost','root','','test') or die(mysqli_error($mysqli));
	if($mysqli) echo 'Sucess';

	if(isset($_POST['save']))
	{
		$id = $_POST['Id'];
		$name = $_POST['Name'];

		$mysqli->query("Insert into user(Id,Name) values('$id','$name')") or die($mysqli->error());

		header("location: index.php");
	}

	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		
		$mysqli->query("Delete from user where Id = $id") or die($mysqli->error());

		header("location: index.php");
	}
?>