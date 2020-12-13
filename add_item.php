<?php
include('layouts/panel_top.php'); 
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}

if(isset($_SESSION['updateMode']))
unset($_SESSION['updateMode']);
if(isset($_POST["submit"]))
add_item();
?>

<script type="text/javascript">
  <?php
  if(isset($_GET["item_name"])){
  echo "
  setTimeout(function(){
  var tem=  document.getElementById('item_name');
  console.log(tem);
    if(tem!=undefined && tem!=null){  
  tem.value='".$_GET['item_name']."';
  tem.disabled='true';
  if('".$_GET["pizza"]."'!='pizza'){
  document.getElementById('PizzaRadio').checked=false;
  document.getElementById('Non-PizzaRadio').checked=true;
}
  console.log(tem);
    if(tem!=undefined && tem!=null){  
  tem.value='".$_GET['item_name']."';
  tem.disabled='true';

}
}
 var tem=  document.getElementById('price');
  console.log(tem);
    if(tem!=undefined && tem!=null){  
  tem.value='".$_GET['price']."';
}

 var tem=  document.getElementById('item_image');
  console.log(tem);
    if(tem!=undefined && tem!=null){  
  tem.value='".$_GET['link']."';
}




},200);
  ";
}
  ?>
</script>
<body>
  <section id="add_item">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      ?>
    <h4 class=" text-primary text-center">Add Item</h4>

    <form class="border p-4"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" onsubmit="return(val());" >
     <div class="form-group">
        <label for="item_name">Item Name:</label>
        <input type="text" class="form-control" name="item_name" id=item_name required >
      </div>
      <div class="radio">
        <label for="category">Category:</label><br>
        <label>
          <input type="radio" name="optradio" value="Pizza" id="PizzaRadio" checked>Pizza
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optradio" value="Non-Pizza" id="Non-PizzaRadio">Non-Pizza
        </label>
      </div>
       <div class="form-group">
        <label for="sel1">Type:</label>
        <select class="form-control" id="sel1" name="VegOrNot" required>
          <option>Veg</option>
          <option>Non-veg</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" min="1" class="form-control" id="price" name="price" required>
      </div>
      <div class="custom-file my-3">
          <div class="col">
            <label  >Upload Image</label>
          </div>
        <div class="col ">
          <input type="file" class="custom-file-input" id="item_image" name="file" required>
          <label class="custom-file-label" for="item_image">Upload Image...</label>
        </div>
      </div>
      <br>
      <div class=" my-4">
        <button type="submit" class="btn btn-primary " name="submit">Submit</button>
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