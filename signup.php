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

  <h2> Complete the following form with your correct details to set up your account.</h2>
  
  <section id='register_student'>
      
    <form action="insert.php" method="POST">
        
      <label>username:</label><br>
      <input type="text" name="username" required><br><br>

      <label>Password:</label><br>
      <input type="text" name="password" required><br><br>

      <label>Firstname:</label><br>
      <input type="text" name="firstname" required><br><br>

      <label>Surname:</label><br>
      <input type="text" name="surname" required><br><br>

      <label>Room number:</label><br>
      <input type= "number" name="roomnumber"><br><br>

      <label>Hostel:</label><br>
      <input type="text" name="hostel"><br><br>

      <input type="submit" value="Sign up">

    </form>
  </section>
  <br>

</body>
</html>
