<?php
  //Connect to the database

  //Database details
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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Hostel Savings Bank</title>
</head>

<body>
    <h1> Hello <bold>
      <?php
        session_start();
        if($_SESSION["studentname"]){
          echo $_SESSION["studentname"];
        }
      ?>
     </bold></h1>

    <p><h2>Your Balance: </h2></p>
    <?php
      $balance = -1;
      //get balance query SELECT * FROM `transactions` WHERE `Student_ID`=4 ORDER BY `ID` DESC LIMIT 1

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      //echo "Connected successfully";

      //check session variables set in previous form
      if($_SESSION["studentid"]){
        $_SESSION["studentid"];
        $studentid = $_SESSION["studentid"];
      }
    
      //construct query using student id
      $stmt = $conn->prepare("SELECT * FROM `transactions` WHERE `Student_ID` = ? ORDER BY `ID` DESC LIMIT 1;");
      $stmt->bind_param("i", $studentid);

      //execute query
      if ($stmt->execute()) {
        //echo "Record found!";
        $result = $stmt->get_result(); 
      } else {
        echo "Error: " . $stmt->error;
      }

      if ($stmt->num_rows < 0) {
        $balance = -1;
      } else {
        // Loop through results - we're expecting only 1 results
        while ($row = $result->fetch_assoc()) {
          //echo "Balance = ". $row["Balance"] . "<br>";
          $balance = $row["Balance"];
        }
      }  
    ?>
    
    <!-- display balance -->
    <div id="balance">
      <?php 
        if ($balance == -1){
          echo "You have no money available with the hostel bank";
        } 
        else {
          echo "Your balance is now <b>". $balance. "</b>";
        }
      ?>            
      <br>
    </div>

    <!-- </bold>! <br>  What would you like to do today? </h1> -->
    <p><button onclick="location.href='deposit.php'">Perform a transaction </button></p>

    <p><button onclick="location.href='login.php'"> Exit Bank </button></p>

</body>
</html>
