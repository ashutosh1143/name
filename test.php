<?php
session_start();
?>
<html>
<head><title> test </title></head>
<body>
	<form action="test.php" method="POST">
		Group name:<input type="text" name="groupName">		
	</form>
</body>
</html>

<?php
require_once("connect.php");
$groupName = @$_POST['groupName'];
$flag=0;
$_SESSION["groupName"] = $groupName;


if ($groupName)
{
			
			$abc="CREATE TABLE `".$groupName."` ( username VARCHAR(30), email VARCHAR(30) )";
			if ($conn->query($abc) === TRUE) {
				$flag=1;
			}
			else {
				echo "Error creating table: " . $conn->error;
					}
}
				
			if ($flag==1)
			{
				header("Location:addByUsername.php");
			}
// if clicked 
					?>