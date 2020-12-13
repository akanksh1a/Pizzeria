<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/log_style.css">
  <link rel = "icon" href = "Image/pizza-slice.png" type = "image/x-icon"> 
  <title> Pizzeria</title>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
 
$(document).ready(function(){
$("#submit").click(function(e){
  // e.preventDefault();
  // alert("asdsad");
var ID = $("#ID").val();
var Password = $("#Password").val();
// alert(ID=="");
// if(ID=="" || Password==""){
  // alert("Empty ID or Password");
  // return;}
$.ajax({
url: "scripts/emp_login.php",
type: "POST",
data: "Password="+Password+"&&ID="+ID,
async:false,
// cache: false,
success: function(r){
// alert(r);
// r=JSON.parse(r);
if(r==1){
//logged in()
alert("Logged In Successfully");
window.location.href="emp.php";
}else{
  alert("Invalid Username or password ");

}
}
});
// }
// return false;
});
});

</script>
<body>
   <div class="form-login-container">
    <form class="form-login">
      <h1>Employee Login In</h1>  
      <div class="field-container">
        <label for="field_user">Emp Id</label>
        <input class="field" name='user' type="text" id="ID" value="" required/>
      </div>  
      <div class="field-container">
        <label for="field_password">Password</label>
        <input class="field" name='password' type="password" id='Password' value="" required/>
      </div>     
      <div class="field-container">
        <button class="submit" type="button" id="submit">Login</button>
      </div>
    </form>
  </div>
</body>
</body>
</html>