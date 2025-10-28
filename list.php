<?php
  //Database details
  $servername = "localhost";
  $username = "userone";
  $password = "password";
  $database = "mytrojanbank";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database );
?>

<!DOCTYPE html>
<html>
<head><title>Student List</title></head>
<body>
<h1>All Students</h1>
<table border="1" cellpadding="5">
  <tr><th>ID</th><th>Firstname</th><th>Surname</th><th>Room number</th><th>Hostel</th></tr>
  <?php foreach ($result as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['ID']) ?></td>
      <td><?= htmlspecialchars($row['Firstname']) ?></td>
      <td><?= htmlspecialchars($row['Surname']) ?></td>
      <td><?= htmlspecialchars($row['Room_number']) ?></td>
      <td><?= htmlspecialchars($row['Hostel']) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
