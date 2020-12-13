<?php
include('layouts/panel_top.php');
// var_dump($_SESSION);
// if(!isset($_SESSION['jsonData'])){
 // header("Location: ../index.php");
  // error();
// }

// if(isset($_SESSION['UD'])){
//   header("Location: scripts/set_user_details.php");
// }

?>
<script type="text/javascript">
$('document').ready(function(){
  //  event.preventDefault();
  // $('#button').click(function()
    // {
    send();
//   }
//     );

// });



    });


    function send(){
  // alert("wokring");
  // let name=$('#name').val();
  //   let email=$('#email').val();
  //   let mobile=$('#mobile').val();
  //   let address=$('#address').val();
  //   let tem="Name="+name+"&&Email="+email+"&&Mobile"+mobile+"&&Address="+address; 

  //   let obs={CustomerName:name,Email:email,Mobile:mobile,Address:address};
  //   let object="UD="+JSON.stringify(obs);
    $.ajax({
      url:"scripts/set_user_details.php",
      type:"GET",
      // data:object,
      async:false,
      success:function(data){
      // alert(data);
      // console.log(data);
        window.location.href="cart.php"
      }
    });
}

  

</script>
<body>
  <!-- <section id="list">
    <div class="container">
      <br>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <br>
    <h4 class="text-center text-primary">User details</h4>
    <form class="border p-4">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" >
      </div>
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" class="form-control" id="mobile" >
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" rows="5" id="address"></textarea>
      </div>
      <button  id="button" type="button" class="btn btn-primary">Save details</button>
    </form>
      </div>
</section> -->

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

</body>
</html>