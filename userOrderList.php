<?php
include('layouts/panel_top.php');
isCustomerLoggedIn();


?>

<script type="text/javascript">
setInterval(() => {
  callMe();
}, 20000);

  callMe();

function callMe(){
  $('document').ready(function(){
$.ajax({
  url:"scripts/getOrdersForUsers.php",
  type:"Get",
  success:function(data){
    update(data);
  }
});
});
}
// new Date("2019-08-17 16:15:07").getTime()
let x;
function update(data){
    console.log(data);
  data=JSON.parse(data);
  console.log(data);
      $('#tableData').html('');
        data.forEach(x=>{
    if(x["Email"]==undefined){
  
      x['OrderId'].forEach(y=>$('#tableData').append(`<tr id='`+y+`' >
        <td>`+y+`</td>
        <td id='itemName`+y+`'></td>
        <td id='ingredients`+y+`'></td>
        <td id='address`+y+`'></td>
        <td id='amount`+y+`'>0</td>

        <td id='status`+y+`'>
            <p id="ssstatus`+ x['MasterOrder']+`"> </p>
        

          </td>
        </tr>`));


    }else{
      $('#itemName'+x['MasterOrder']).append('<li>'+x['Item Name']+'</li>');
      $('#ingredients'+x['MasterOrder']).append('<li>'+x['Ingredients']+'</li>');
      $('#address'+x['MasterOrder']).html('<li>'+x['Address']+'</li>');
      $('#amount'+x['MasterOrder']).html(getTotalByMasterOrder(x['MasterOrder']));
      // $('#status'+x['MasterOrder']).html(getStatusByMasterOrder(x['MasterOrder']));
      let tem=new Date().getTime()-new Date(x['Time']).getTime();
      tem=tem/60000;
      tem=tem.toFixed(0);
      tem=parseInt(tem);
      if(x["Status"]=="Delivered"){
  $('#status'+x['MasterOrder']).html("Delivered on "+x['Time']);
      }else if(x["Status"]=="Pending") {
//
if(tem>60){
        tem ="Will be arriving shortly";
      }else{
        tem="<br> <small><em>"+(60-tem)+"<small> minutes remaining</small></em>";
      }
      // console.log(tem);
      $('#status'+x['MasterOrder']).html(getStatusByMasterOrder(x['MasterOrder'])+" "+tem);
//


      }else if(x["Status"]=="Rejected"){
          $('#status'+x['MasterOrder']).html("Rejected");

      }
      


    }
  }

  );



  
        function getStatusByMasterOrder(id){
          console.log("called");
  let da=0;
  $.ajax({
  url:"scripts/get_Status_masterorder.php",
    type:"GET",
    data:"ID="+id,
    async:false,
    success:function(data){
      // console.log(data);
         data=JSON.parse(data);
      // console.log(data[0].Price);
      // alert(data[0].Price);
      da= data[0].Status;
      // return parseFloat(da).toFixed(2);
      // console.log("Status is "+da);
return da;

    }
  });
  return da;
// return parseFloat(da).toFixed(2);
}
  

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

}
// function ses(id){

//   var cu=$('#option'+id).val();
//   $.ajax({
//     url:'scripts/updateOrder.php',
//     type:'POST',
//     data:'ID='+id+'&&Value='+cu,
//     success:function(data){
//     }


//   });
//   callMe();
// }

</script>
<body>
  <section id="emp_panel">
    <div class="container">
    <br>
    <button class="float-right btn btn-sm btn-danger ml-2" onclick="location.href='scripts/logout.php'">Logout</button>
    <button class="float-right btn btn-sm btn-primary"  onclick="location.href='edit_user.php'"  >Edit Profile</button>
    <button class="float-right btn btn-sm btn-primary mr-2"  onclick="location.href='index.php'"  >Main Page</button>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <h5 class="display-4 text-center">Welcome <?php echo $_SESSION["Name"]?></h5>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order</th>
          <th scope="col">Ingreidents</th>
          <th scope="col">Deliver to</th>
          <th scope="col">Amount</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody id="tableData">
       
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