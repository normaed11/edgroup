
<?php
// reports all errors for database connection
error_reporting(E_ALL); 
ini_set('display_errors', 1);


// connecting to the database using our log in information
$servername="localhost";
$username="root";
$password="";
$db="edgroup";

$conn = new mysqli($servername, $username, $password,$db);

//check for connection errors
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

//successful connection
print ("success");
//creating the sql query
// $sql = "CREATE TABLE users (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     email VARCHAR(100) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     ip VARCHAR(20),
//     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
//     updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )"; 
$sql= "ALTER TABLE users ADD fname varchar(15)";
//run the query and check for errors
if ($conn->query($sql) === TRUE) { 
    echo "Database created successfully"; 
} else { 
    echo "Error creating database: " . $conn->error; 
} 
//closes the connection 
$conn->close();
?>
<h1>TEST PAGE</h1>

