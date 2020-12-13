<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!="Admin"){
  // error();
  header("Location: admin_log.php");
}
?>
<body>
  <section id="admin_panel">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      ?>
    <div class="row">
      <div class="col-md-3">
        <p class="lead">Items</p>       
      </div>
      <div class="col-md-6 text-left">
        <div class="row">
          <div class="col">
            <button class="btn  btn-primary"  onclick="location.href='add_item.php'" >Add Items</button>
          </div>
          <div class="col">
            <button class="btn  btn-primary"  onclick="location.href='list_item.php'">Item List</button>
          </div>
        </div>
        
      </div>
  </div>
  <div class="row">
      <div class="col-md-3">
        <p class="lead">Ingredients</p>       
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col">
            <button class="btn  btn-info" onclick="location.href='add_ingred.php'" >Add Ingredients</button>
          </div>
          <div class="col">
            <button class="btn  btn-info" onclick="location.href='list_ingred.php'" >Ingredients List</button>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-3">
        <p class="lead">Order</p>       
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col">
            <button class="btn  btn-success" onclick="location.href='index.php'">Add Order</button>
          </div>
          <div class="col">
            <button class="btn  btn-success" onclick="location.href='order_list.php'">Order list</button>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-3">
        <p class="lead">Employee</p>        
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col">
            <button class="btn  btn-danger" onclick="location.href='add_emp.php'">Add Employee</button>
          </div>
          <div class="col">
            <button class="btn  btn-danger" onclick="location.href='emp_list.php'">Employee list</button>
          </div>
        </div>
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