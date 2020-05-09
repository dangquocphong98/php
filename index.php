<?php 
	require_once 'process.php';
?>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<?php 
	$mysqli = new mysqli('localhost','root','','test') or die(mysqli_error($mysqli));
	if($mysqli) echo 'Sucess';

	$results = $mysqli->query("Select * from user") or die($mysqli->error);
	pr_ev($results);
	function pr_ev($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
?>
<hr>
<div class="container">
<table class="table table-bordered">
	<tr>
		<td>Id</td>
		<td>Name</td>
		<td></td>
	</tr>
	<?php while($row = $results->fetch_assoc()): ?>
	<tr>
		<td><?php echo $row["Id"]; ?></td>
		<td><?php echo $row["Name"]; ?></td>
		<td>
		<a href="process.php?delete=<?php echo $row["Id"];?>">Xóa</a>
		</td>
	</tr>
	<?php endWhile; ?>
</table>

<form method="POST" action="process.php">
	Id : <input type="text" name="Id"/>
	Name : <input type="text" name="Name"/>
	<button type="submit" name="save">Save</button>
</form>
</div>
