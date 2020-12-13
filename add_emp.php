<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}
?>

<script type="text/javascript">
  
$(document).ready(function(){
$("#submit").click(function(e){
var Name = $("#employee_name").val();
var Password = $("#employee_password").val();
var ID = $("#employee_id").val();
const name_pattern = /^[a-zA-Z]{3,10}$/;

const Id_pattern = /^[A-Z0-9]{6,6}$/;

var data={Name,Password,ID};

if (Name.length > 2 && Password.length > 5 && ID.length == 6 ) {
  if ((name_pattern.test(Name))  && (Id_pattern.test(ID))) {
    $.ajax({
            type: "POST",
            url: "scripts/add_emp.php",
            data: "Name="+Name+"&&Password="+Password+"&&ID="+ID,
            cache: false,
            success: function(r){
            $('#result').html("");

            $('#result').append(r);
            setTimeout(window.location.href="emp_list.php",1000);

            }
         });
  }
  else
  {
      alert("Wrong Input");
  }
}
else
{
  alert("Wrong Input");
}

});
});

</script>
<div id="result">

</div>
<body>
  <section id="add_ingre">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      ?>
    <h4 class=" text-primary text-center">Add Employee</h4>

    <form class="border p-4" id="addForm">
     <div class="form-group">
        <label for="employee_name">Name:</label>
        <input type="text" class="form-control" id="employee_name" name="Name" required>
      </div>
      <div class="form-group">
        <label for="employee_password">Employee password:</label>
        <input type="password" class="form-control" id="employee_password" name="Password" required>
        <small class="text-muted">(min. length : 6)</small>
      </div>
      <div class="form-group">
        <label for="employee_id" name="ID" required >Employee id:</label>
        <input type="text" class="form-control" id="employee_id" required >
        <small class="text-muted">(Character should be capital and length must be 6. Eg : AB1234)</small>
      </div>
      <div class=" my-4">
        <button type="button" id="submit" class="btn btn-primary ">Add Employee</button>
      </div>
    </form>
  </div>
  </section>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());
  </script>
  <script type="text/javascript">


  </script>
</body>
</html>