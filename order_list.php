<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}
?>

<script type="text/javascript">
callMe();
function callMe(){
  $('document').ready(function(){
$.ajax({
  url:"scripts/get_orders.php",
  type:"Get",
  success:function(data){
    update(data);
  }
});
});
}

let x;
function update(data){
  data=JSON.parse(data);
  console.log(data);
      $('#tableData').html('');
        data.forEach(x=>{
    if(x["Email"]==undefined){
      // $('#pendingOrder').html(x["Pending"]);
      // $('#deliveredOrder').html(x["Delivered"]);
      // $('#rejectedOrder').html(x["Rejected"]);

      // $('#totalOrder').html(x["Total"]);
    
      // console.log("oddd"+x['OrderId']);
      x['OrderId'].forEach(y=>$('#tableData').append(`<tr id='`+y+`' >
        <td>`+y+`</td>
        <td id='itemName`+y+`'></td>
        <td id='ingredients`+y+`'></td>
        <td id='address`+y+`'></td>
        <td id='amount`+y+`'>0</td>

        <td>
            <button class="btn btn-info" onclick="location.href='o.php?ID=`+y+`'" >Edit</button>

            <button class="btn btn-danger" onclick="location.href='scripts/deleteByMasterOrder.php?ID=`+y+`'" >Delete</button>
          </td>
        </tr>`));


    }else{
      $('#itemName'+x['MasterOrder']).append('<li>'+x['Item Name']+'</li>');
      $('#ingredients'+x['MasterOrder']).append('<li>'+x['Ingredients']+'</li>');
      $('#address'+x['MasterOrder']).html('<li>'+x['Address']+'</li>');
      $('#amount'+x['MasterOrder']).html(getTotalByMasterOrder(x['MasterOrder']));

    }
  }

  );

        function getTotalByMasterOrder(id){
  let da=0;
  $.ajax({
  url:"scripts/get_total_amount_masterorder.php",
    type:"GET",
    data:"ID="+id,
    async:false,
    success:function(data){
      // console.log(data);
         data=JSON.parse(data);
      // console.log(data[0].Price);
      // alert(data[0].Price);
      da= data[0].Price;
      return parseFloat(da).toFixed(2);


    }
  });
return parseFloat(da).toFixed(2);
}

 function get_items_from_masterorder(data){
  console.log(data);

 }       
  
//   data.forEach(x=>{
//     if(x["Address"]==undefined){
//       $('#pendingOrder').html(x["Pending"]);
//       $('#deliveredOrder').html(x["Delivered"]);
//       $('#rejectedOrder').html(x["Rejected"]);

//       $('#totalOrder').html(x["Total"]);
//     }else{
//       $('#tableData').append(`<tr>
// <td>`+x["Order ID"]+`</td>
// <td>`+x["Item Name"]+`</td>
// <td>`+x["Ingredients"]+`</td>
// <td>`+x["Address"]+`</td>
// <td><span>&#8377</span>`+x["Amount"]+`</td>
// <td>
// <div class="dropdown">

// <select class="dropdown-toggle" name="drop" onchange="ses('`+x["Order ID"]+`')" id="`+x["Order ID"]+`" >
// <option value="Delivered" value="Pending" default>Pending</option>
// <option value="Delivered" value="Delivered">Delivered</option>
// <option value="Rejected" value="Rejected">Rejected</option>
// </select>

// </div>
// </td>
// </tr>`);
//     }
//     // if(x.contain)
//   });
  // $('#pendingOrder').html()

}
function ses(id){
  // console.log(id);
  var cu=$('#option'+id).val();
  $.ajax({
    url:'scripts/updateOrder.php',
    type:'POST',
    data:'ID='+id+'&&Value='+cu,
    success:function(data){
    }


  });
  callMe();
}


</script>
<body>
  <section id="emp_panel">
    <div class="container">
    <?php
    include('layouts/panel_heading.php')
    ?>
  
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order</th>
          <th scope="col">Ingreidents</th>
          <th scope="col">Deliver to</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tableData">
       <!--  <tr>
          <td>OrderId</td>
          <td>Item Name</td>
          <td>Ingredients</td>
          <td>Deliver ADdress</td>
          <td><span>&#8377</span>Amount</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pending
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item " href="#">Delivered</a>
                <a class="dropdown-item " href="#">Rejected</a>
              </div>
            </div>
          </td>
        </tr> -->
   
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