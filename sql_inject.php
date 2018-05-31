<?php
	$servername = "localhost";
	$username = "root";
	$password = "asd";
	$db_name = "hotel_booleana";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db_name);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


$login_name = "pippo' OR 1=1 -- ";
// "SELECT * FROM ospiti WHERE name = 'pippo' OR 1=1 -- AND PASSWORD ";
$sql = "SELECT * FROM ospiti WHERE name = '".$login_name."'";
$result = $conn->query($sql);

//SECONDO METODO
$login_name = "pippo' OR 1=1 -- ";
$stmt = $conn->prepare("SELECT * FROM ospiti WHERE name = ?");
$stmt->bind_param("s", $login_name);


if ($result->num_rows > 0){
	echo "You can enter the restricted area";
}
else{
	echo "Thou shalt not pass";
}

































































//$login_name = "pippo' OR 1=1 -- ";

?>
