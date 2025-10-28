<!DOCTYPE html>
<html>
<head>
  <title>Hostel Savings Bank</title>
</head>
<body>
  <title>Welcome To the hostel savings bank!</title>
  <h1> Welcome To the hostel savings bank! </h1>
  
  <?php
    //start the session
    session_start();
    $_SESSION["studentid"];
    $_SESSION["studentname"];
  ?>

  <h2> Enter your username and password to login </h2>
  
  <form action="login.php" method="POST">
    <label>username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="text" name="password" required><br><br>

    <input type="submit" value="Login">

    <p> OR you can <a href= signup.php> sign up </a></p>
    
  </form>
  <br>
  
    <script>
      function myFunction() {
        var x = document.getElementById("register_student");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>

</body>
</html>

<?php
  //Set Database details
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

      // Who's knocking
      //print_r($_POST);
      $username = $_POST['username']; 
      $password = $_POST['password']; 
      
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      //echo "Connected successfully";

     //construct query using user inputs
      $stmt = $conn->prepare("SELECT * FROM `students` WHERE `username`= ? AND `password`= ?");
      $stmt->bind_param("ss", $username, $password );

      if ($stmt->execute()) {
          echo "Record found!";
          $result = $stmt->get_result(); 
          
          echo "number of records found = ".$result->num_rows;
          
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //echo "id: " . $row["ID"]. " - Name: " 
              //    . $row["Firstname"]. " " . $row["Surname"]. "<br>";

              //save student id and firstname for use in next page
              $_SESSION["studentid"] = $row["ID"];
              $_SESSION["studentname"] = $row["Firstname"];
            }
          }
      } else {
      echo "Error: " . $stmt->error;
      }
      
      //set the redirect location
      header('Location: index.php');
      exit();

      // Close connections
      $stmt->close();
      $conn->close();

  }
?>

