<!DOCTYPE html>
<html>
<head>
  <title>Hostel Savings Bank: Deposit or Withdrawal</title>
</head>
<body>
  
  <h1> What would you like to do today? </h1>
  <form action="transaction.php" method="POST">
    
    <p>What transaction are you performing?</p>
    <input type="radio" id="deposit" name="transaction_type" value="deposit">
    <label for="html">Deposit</label><br>

    <input type="radio" id="withdraw" name="transaction_type" value="withdraw">
    <label for="css">Withdrawal</label><br>
  <br>  

    <label>How much are you Depositing/Withrawing?:</label><br>
    <input type="number" name="amount"><br><br>

    <input type="submit" value="Go">
  </form>

  <br>
</body>
</html>
