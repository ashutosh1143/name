<?php
session_start();
?>
<html>
<head><title> Add by username </title></head>
<body>
	<form action="addByUsername.php" method="POST">
			
		user name:<input type="text" name="username1">
	</form>
	<script>
	window.alert(5 + 6);
	</script>
</body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name1=@$_POST['username1'];
if ($name1)
{
$sql = "SELECT id, username, email FROM myguests";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		if ($name1==$row["username"])
		{	
			$message="hello hello";
			$username2=$row["username"];
			$email2=$row["email"];
			$id1=$row["id"];
			$abc="INSERT INTO notifications (message ,not_id)
					VALUES('$message','$id1' ) ";
			
			if ($conn->query($abc) === TRUE) {
				echo "notification table ceated";
						}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
			
			//they have to accept it
		$sql = "INSERT INTO $_SESSION[groupName] (username,email)
		VALUES ('$username2', '$email2')";

		if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
		} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
}
		
			
		}
    }
} else {
    echo "0 results";
}
}
else
{
	echo "haha";
}



?>
</html>