<?php 
	$servername="localhost";
	$username="root";
	$passward="";
	$dbname="crud";
	$link=mysqli_connect($servername,$username,$passward,$dbname);
	$con=mysqli_select_db($link,$dbname);
	if($con)
	{
		echo ("Connection is successfully");
	}
	else
	{
		die("connection failed beacuse".mysqli_connect_errno());
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Crud operation</title>
</head>
<body>
	<header>
	<center>
		<form method="post" action="" name="form1">
			<table>
				<tr>
					<td>Enter name</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Enter city</td>
					<td><input type="text" name="city"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email"></td>
				</tr>
				<td colspan="2" align="center">
				<input type="submit" name="submit1" value="insert">
				<input type="submit" name="submit2" value="delete">
				<input type="submit" name="submit3" value="update">
				<input type="submit" name="submit4" value="display">
				<input type="submit" name="submit5" value="search">
				</td>
			</table>
		</form>
	</center>
	</header>
</body>
</html>

<?php
	if(isset($_POST["submit1"]))
	{
		mysqli_query($link,"insert into operation values('$_POST[username]','$_POST[city]','$_POST[email]')");
		echo "Record inserted successfully";
	}
	if(isset($_POST["submit2"]))
	{
		mysqli_query($link,"delete from operation where username='$_POST[username]'");
		echo "Record deleted successfully";
	}
	if(isset($_POST["submit3"]))
	{
		mysqli_query($link,"update operation set username='$_POST[city]'where username='$_POST[username]'");
		echo "Record update successfully";
	}
	if(isset($_POST["submit4"]))
	{
		$res=mysqli_query($link,"select * from operation");
		echo "<table border=1>";
			echo"<tr>";
			echo"<th>"; echo "name";echo "</th>"; 
			echo"<th>"; echo "city";echo "</th>";
			echo"<th>"; echo "email";echo "</th>";
			echo "</tr>";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo"<td>"; echo $row["username"];echo "</td>";
			echo"<td>"; echo $row["city"];echo "</td>";
			echo"<td>"; echo $row["email"];echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	if(isset($_POST["submit5"]))
	{
		  $res=mysqli_query($link,"select * from operation where username='$_POST[username]'");
		  echo "<table border=1>";
		  echo"<tr>";
		  echo"<th>"; echo "name";echo "</th>";
		  echo"<th>"; echo "city";echo "</th>";
		  echo"<th>"; echo "email";echo "</th>";
		  echo "</tr>";
		  while($row=mysqli_fetch_array($res))
		  {
			echo "<tr>";
			echo"<td>"; echo $row["username"];echo "</td>";
			echo"<td>"; echo $row["city"];echo "</td>";
			echo"<td>"; echo $row["email"];echo "</td>";
			echo "</tr>";
		  }
		  echo "</table>";
	}

?>