<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}
?>
<div class="alertdiv"></div>
<body>
  <section id="add_ingre">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      // include('/scripts/utilities.php');
      ?>
    <h4 class=" text-primary text-center">Add Ingredents</h4> 

    <form class="border p-4" method="POST" action="scripts/add_ingredients.php"  enctype="multipart/form-data" >
     <div class="form-group">
        <label for="item_name" >Item Name:</label>
        <input type="text" class="form-control" id="item_name" name="ItemName"  required>
      </div>
    
       <div class="form-group">
        <label for="sel1" >Type:</label>
        <select class="form-control" id="sel1" name="Type" required>
          <option>Veg</option>
          <option>Non-veg</option>
        </select>
      </div>
      
      <div class="form-group" >
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="Price" required>
      </div>
      <div class="custom-file my-3">
          <div class="col">
            <label  >Upload Image</label>
          </div>
        <div class="col ">
          <input type="file" class="custom-file-input" id="file" name="file" accept=".png" required>
          <label class="custom-file-label" for="item_image">Upload Image...</label>
        </div>
      </div>
      <br>
      <div class=" my-4">
        <button type="Submit" onclick="add_ingredients()" class="btn btn-primary" name="Submit">Submit</button>
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

</body>
</html>