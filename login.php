<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
}
else{ 
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#submit").click(function(e){
      var data={
         email : $("#InputEmail1").val(),
         pass:$("#InputPassword1").val(),
      };
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      var passw=  /^[A-Za-z]\w{7,14}$/;
      data=JSON.stringify(data);
      console.log(data);
      if( 1 || (emailPattern.test($("#InputEmail1").val()) && passw.test($("#InputPassword1").val()))){
        $.ajax({
        url: "scripts/customerLogIn.php",
        type: "POST",
        data: "data="+data,
        async:false,
        success: function(r){
          console.log(r);
          if(r==1){
            Swal.fire({ position: 'center',  type: 'success', title: 'Logged In successfully!', showConfirmButton: false,timer: 1500 });
            setTimeout(window.location.href="index.php",2000);
          }
          else{
             Swal.fire({
                position: 'center',
                type: 'error',
                title: "Invalid credential !Please try again !",
                showConfirmButton: false,
                timer: 1500
              });
          }
        }
      });
      }
      else{
          Swal.fire({
                position: 'center',
                type: 'error',
                title: "Enter correct Email and Password",
                showConfirmButton: false,
                timer: 1500
              });
      }
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
      <h4 class="card-title text-center m-3">Login</h4>
      <div class="card-body px-5">
        <!-- <form method="POST"> -->
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary" id="submit">Login</button>
          <br><br>
          <a href="signup.php" class="" >If you are new here,click here</a>
        <!-- </form> -->
      </div>
    </div>
  </div>
</section>

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