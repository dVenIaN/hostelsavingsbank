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

        // 2. Prepare your data
//        print_r($_POST);
        $type = $_POST['transaction_type']; 
        $amount = $_POST['amount']; 

        session_start();
        //check session variables set in previous form
        if($_SESSION["studentid"]){
            $_SESSION["studentid"];
            $studentid = $_SESSION["studentid"];
        }

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        $stmt = $conn->prepare("SELECT * FROM `transactions` WHERE `Student_ID` = ? ORDER BY `ID` DESC LIMIT 1;");
        $stmt->bind_param("i", $studentid);

        if ($stmt->execute()) {
            echo "Record found!";
            $result = $stmt->get_result(); 
        } else {
        echo "Error: " . $stmt->error;
        }

        // Loop through rows
        while ($row = $result->fetch_assoc()) {
            echo "Balance = ". $row["Balance"] . "<br>";
            $balance = $row["Balance"];
        }
        } else {
            echo "Query error: " . $stmt->error;
        }


    //Check and reset balance for update
        if ($type == 'withdraw') {
            echo "withdraw";
            $balance =  $balance - $amount;
        } else if ($type == 'deposit') {
            echo "deposit";
            $balance =  $balance + $amount;
        }

        echo $type;
        $stmt = $conn->prepare("INSERT INTO transactions (Type, Amount, Student_ID, Balance) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siii", $type, $amount, $studentid, $balance);

        //Execute the query
        if ($stmt->execute()) {
            echo "Record inserted successfully!";
            echo "<br> >> Your balance is now ". $balance . "<br>";
            echo "<a href='index.php'> Go back</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        //Close connections
        $stmt->close();
        $conn->close();

        //set the redirect location
        header('Location: index.php');
        exit();

?>



