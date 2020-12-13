<?php
include('layouts/panel_top.php');
?>

<script type="text/javascript">
  function hel(tem){
     Swal.fire({
      position: 'center',
      type: 'warning',
      title: tem,
      showConfirmButton: true,
      timer: 1500
    });
  }
$(document).ready(function(){
  $("#submit").click(function(e){
    e.preventDefault();
    var data={
       name : $("#InputName").val(),email : $("#Email1").val(), mobile:$("#Inputmobile").val(),pass:$("#Password1").val(),
       confirmPass:$("#confirmPassword1").val(),address:$("#address").val(), pinCode:$("#Pin").val(),
    };
     var name = $("#InputName").val();
     var email = $("#Email1").val();
     var mobile=$("#Inputmobile").val();
     var pass=$("#Password1").val();
     var address=$("#address").val();
     var pinCode=$("#Pin").val();
   
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var passw= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;;
  var namepattern = /^[a-zA-Z ]{2,30}$/;
  var addresspattern = /^[a-zA-Z ,.-/\w0-9]{5,}$/;
  var pinpattern= /^[0-9]{6,6}$/;
  var mobilepattern = /^[0-9]{10,10}$/;
   if((data.pass!= data.confirmPass) && passw.test(pass)){
      Swal.fire({
       position: 'center', type: 'warning',title: 'Password and Confirm Password doest not match!', showConfirmButton: true, timer: 1500
    });
    return;
  }
  if(data.name.length==0 || !namepattern.test(name)){
    hel("Entered Name is invalid");
    return;
  }
  if(data.email.length==0 || !emailPattern.test(email)){
    hel("Entered Email is invalid");
    return;
  }
  if(data.mobile.length==0 || !mobilepattern.test(mobile)){
    hel("Entered mobile number is invalid");
    return;
  }
  if(data.address.length==0 || !addresspattern.test(address)){
    hel("Entered Address is invalid");
    return;
  }
  if(data.pinCode.length==0 || !pinpattern.test(pinCode)){
    hel("Entered Pincode is invalid")
    return;
  }
  data=JSON.stringify(data);
    $.ajax({
        url: "scripts/customerSignUp.php",
        type: "POST",
        data: "data="+data,
        async:false,
        success: function(r){
          r=JSON.parse(r);
          if(r.message=="Success"){
            Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Your account has been registerd successfully,Redirecting to Log In Page !',
              showConfirmButton: false,
              timer: 3000
            });
           setTimeout(window.location.href="login.php",2000);
          }
          else{
           Swal.fire({
            position: 'center',
            type: 'error',
            title: r.message,
            showConfirmButton: false,
            timer: 3000
          });
        }
      }
      });
});
});



</script>
<body>
  <section id="emp_panel">
    <div class="container">
    <br>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <br>
    <div class="card w-75" style="margin-left: 12%">
      <h4 class="card-title text-center m-3">Sign Up</h4>
      <div class="card-body px-5">
        <form >
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"  placeholder="Enter Name" id="InputName" required>
          </div>
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" class="form-control" id="Email1" placeholder="Enter E-mail" required>
          </div>
          <div class="form-group">
            <label for="InputMobile1">Mobile </label>
            <input type="tel" class="form-control" placeholder="Enter Mobile No." id="Inputmobile" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="Password1" placeholder="Password" required>
            <small>(Password should be between 6 to 20 characters, contain at least one numeric digit, one uppercase and one lowercase letter)</small>
          </div>
          <div class="form-group">
            <label for="InputconfirmPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword1" placeholder="Confirm Password" required>
          </div>
          <div class="form-group">
            <label for="Textarea1">Address</label>
            <textarea class="form-control" id="address" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="Pin">Pin Code</label>
            <input type="text" class="form-control" id="Pin" placeholder="Pin Code" required pattern="^[0-9]{6}$" >
          </div>    
          <button type="button" class="btn btn-primary" id="submit">Sign Up</button>
          <!-- </button> -->
          <br><br>
          <a href="login.php" class="" >Already Register.</a>
        </form>
      </div>
    </div>
  </div>
</section>s

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());

  </script>
</body>
</html>