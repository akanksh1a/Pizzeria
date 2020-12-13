<?php

include('layouts/panel_top.php');
// $in="123123";
// echo "delete from item where ItemName='$in";
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}

?>
<script>
function delete_item(itemId) {
  // $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "scripts/delete_item.php",
    type: "POST",
    data:'itemId='+itemId,
    success: function(data){
      // $(editableObj).css("background","#FDFDFD");
      // console.log(data);
      document.getElementById(itemId).style.display='none';
document.getElementById("alertdiv").innerHTML='<div class="alert alert-success" alert="role">* Item Deleted Succesfully </div>';

      // alert("success");

    } ,
    error: function () {
document.getElementById("alertdiv").innerHTML='<div class="alert alert-danger" alert="role">* Unable to delete Item </div>';


      // alert("Problen in deleting Item")


    }       
   });
}


function edit_item(itemId) {
  console.log(itemId);
  // $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "scripts/edit_item.php",
    type: "POST",
    data:'itemId='+itemId,
    success: function(data){
      // $(editableObj).css("background","#FDFDFD");
      // console.log("date is"+data);
      // document.getElementById(itemId).style.display='none';
// document.getElementById("alertdiv").innerHTML='<div class="alert alert-success" alert="role">* Item Deleted Succesfully </div>';

      // alert("success");
      var s=JSON.parse(data);
      // console.log(s);
      window.location.href = 'edit_item.php?item_name='+s[0].ItemName+"&&pizza="+s[0].Type+"&&price="+s[0].Price+"&&link="+s[0].link+"&&type="+s[0].Type; 

    } ,
    error: function () {
document.getElementById("alertdiv").innerHTML='<div class="alert alert-danger" alert="role">* Unable to Edit Item </div>';


      // alert("Problen in deleting Item")


    }       
   });
}
</script>
<div id="alertdiv"></div>
<body>
  <section id="list">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      ?>
    <h4 class="text-center text-primary">List</h4>
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Type</th>
          <th scope="col">Category</th>
          <th scope="col">Amount</th>
          <th scope="col">File</th>
        </tr>
      </thead>
      <tbody>
        <tr>
         

          <?php
  get_items();
          ?>
           
          </td>
        </tr>
      </tbody>
    </table>
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