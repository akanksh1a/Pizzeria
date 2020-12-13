<!DOCTYPE html>
<html lang="en">
<?php
include("scripts/utilities.php");
login("Admin");

?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/log_style.css">
  <link rel="icon" href="Image/pizza-slice.png" type="image/x-icon">
  <title> Pizzeria</title>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
 <?php if(isset($error) && $error){ 
    echo" alert('There was an issue with the form');";
} ?>
 </script>
<body>

 
  <div class="form-login-container">
    <form class="form-login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Admin Login In</h1>
      <div class="field-container">
        <label for="field_user">User Id</label>
        <input class="field" name='user' type="text" id="field_user" required />
      </div>
      <div class="field-container">
        <label for="field_password">Password</label>
        <input class="field" name='password' type="password" id='field_password' required />
      </div>
      <div class="field-container">
        <button class="submit" type="submit" >Login</button>
      </div>
    </form>
  </div>
</body>
</body>

</html>