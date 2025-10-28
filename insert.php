<?php
$servername = "localhost";
$username = "userone";
$password = "password";
$database = "mytrojanbank";

// Create connection
$conn = new mysqli($servername, $username, $password, $database );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Prepare your data for query
    print_r($_POST);
    $Firstname = $_POST['firstname'];
    $Surname = $_POST['surname']; 
    $room_number = $_POST['roomnumber']; 
    $Hostel = $_POST['hostel'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    echo($Firstname);
    echo($Surname);
    echo($room_number);
    echo($Hostel);
    echo($username);
    echo($password);

    // Use prepared statement
    $stmt = $conn->prepare("INSERT INTO students (Firstname, Surname, Room_number, Hostel, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $Firstname, $Surname, $room_number, $Hostel, $username, $password);

    if ($stmt->execute()) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    //Get the ID
    $stmt = $conn->prepare("SELECT ID, Firstname  FROM students WHERE Firstname = ? AND Surname = ? AND Room_number = ? AND Hostel = ? AND username = ? AND password = ?" );
    $stmt->bind_param("ssisss", $Firstname, $Surname, $room_number, $Hostel, $username, $password);

    //Retrieve newly entered record
    if ($stmt->execute()) {
      echo "Record found!";
      $result = $stmt->get_result(); 
      
      echo "number of records found = ".$result->num_rows;
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          //echo "id: " . $row["ID"]. " - Name: " . $row["Firstname"]. " " . $row["Surname"]. "<br>";

          //save student id and firstname for use in next page
          $_SESSION["studentid"] = $row["ID"];
          $_SESSION["studentname"] = $row["Firstname"];
        }
      }
      } else {
          echo "Error: " . $stmt->error;
      }
    }

    //set the redirect location
    header('Location: index.php');
    exit();

// Close connections
$stmt->close();
$conn->close();
?>



